<?php

namespace App\Http\Controllers\FrontendControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News\NewsTypeModel;
use App\Models\News\NewsModel;
use App\Models\Comments\CommentModel;
use App\Models\Settings\SettingModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostDocModel;
use App\Models\News\ContentWriterModel;
use DB;


class FrontpageController extends Controller
{
  public function index()
  {

    $breaking_news1 = NewsModel::where(['is_specialnews' => '1', 'status' => '1'])->orderBy('ordering', 'desc')->first();
    $breaking_news2 = NewsModel::where(['is_specialnews' => '1', 'status' => '1'])->orderBy('ordering', 'desc')->offset(1)->first();

    $headline1 = NewsModel::where(['is_specialnews' => '2', 'status' => '1'])->orderBy('ordering', 'desc')->first();
    $headline2 = NewsModel::where(['is_specialnews' => '2', 'status' => '1'])->orderBy('ordering', 'desc')->offset(1)->first();
    $headline3 = NewsModel::where(['is_specialnews' => '2', 'status' => '1'])->orderBy('ordering', 'desc')->offset(2)->first();
    $headline4 = NewsModel::where(['is_specialnews' => '2', 'status' => '1'])->orderBy('ordering', 'desc')->offset(3)->first();
    $trending = NewsModel::where('uri', '<>', 'NULL')->orderBy('visiter', 'desc')->limit(5)->get();
    $video = NewsModel::where(['status' => '1'])->where('news_video', '!=', 'NULL')->orderby('ordering', 'desc')->take(3)->get();
    return view('themes.default.frontpage', compact('breaking_news1', 'breaking_news2', 'headline1', 'headline2', 'headline3', 'headline4', 'trending', 'video'));
  }

  public function newstype($newstype)
  {
    $news_type = NewsTypeModel::where('uri', $newstype)->first();
    if ($news_type) {
      $type_title = $news_type['news_type'];
      $newstype_id = $news_type['id'];
      $data = NewsTypeModel::find($newstype_id)->news()->where(['status' => '1'])->orderBy('ordering', 'desc')->paginate(12);
      $fresh_news = NewsModel::where(['status' => '1'])->orderBy('id', 'desc')->take(6)->get();
      if ($news_type->id == '93') {
        return view('themes.default.video', compact('data', 'type_title', 'newstype_id', 'news_type', 'fresh_news'));
      }
    } else {
      $type_title = '';
      $newstype_id = 1;
      $data = NewsTypeModel::find(93)->news()->where(['status' => '1'])->orderBy('ordering', 'desc')->paginate(12);
      $fresh_news = NewsModel::where(['status' => '1'])->orderBy('id', 'desc')->take(6)->get();
    }





    return view('themes.default.news-list', compact('data', 'type_title', 'newstype_id', 'news_type', 'fresh_news'));
  }


  public function newsdetail($newstype, $year, $month, $day, $uri)
  {

    $uri_1 = NewsTypeModel::where('uri', $newstype)->first();
    $type_title = $uri_1['news_type'];
    $newstype_id = $uri_1['id'];
    $related_news = NewsTypeModel::find($newstype_id)->news()->orderBy('ordering', 'desc')->limit(6)->get();
    $uri = explode('.', $uri);
    $_uri = $uri[0];
    $data = NewsModel::where('uri', $_uri)->first();
    if ($data->id) {
      $visiter = $data->visiter + 1;
      DB::table('cl_news')
        ->where('id', $data->id)
        ->update(['visiter' => $visiter]);
    }
    $comments = CommentModel::where(['news_id' => $data->id, 'status' => 1])->get();
    $writer_id = $data['content_writer'];
    $writer_news = NewsModel::where(['status' => '1', 'content_writer' => $writer_id])->orderBy('ordering', 'desc')->take(6)->get();
    return view('themes.default.news-single', compact('data', 'related_news', '_uri', 'comments', 'writer_news'));
  }

  /***********************************
   ******** Root Navigation ***********
   ************************************/

  public function sendmail()
  {
    $data = SettingModel::where('id', 1)->first();
    Mail::to($data->email_primary)->send(new SendMail());
    return redirect()->back()->with('message', 'Contact message successfully sent.');
  }

  private function news_block_one($id, $limit)
  {
    $newstype_id = $id;
    $data = NewsTypeModel::find($newstype_id)->news()->where('is_headline', '0')->where('is_breaking_news', '0')->orderBy('ordering', 'desc')->limit($limit)->get();
    return $data;
  }

  private function news_block_one1($newstype, $limit)
  {
    $news = NewsModel::orderBy('ordering', 'desc')->limit(1)->get();
    $data  = array();
    $i = 1;
    foreach ($news as $row) {
      $type = explode(',', $row->news_type);
      if (in_array($newstype, $type)) {
        $data[] = $row;
        if ($i >= 1) {
          continue;
        }
      }
      $i++;
    }
    return $data;
  }

  public function content_search(Request $request)
  {
    if ($request->has('content_search')) {
      $content_search = $request->content_search;
      $data = NewsModel::where('news_title', 'like', '%' . trim($content_search) . '%')->orWhere('news_content', 'like', '%' . trim($content_search) . '%')->paginate(20);
      return view('themes.default.search', compact('data'));
    }
  }

  public function pagedetail($uri)
  {
    if (!check_uri($uri)) {
      abort(404);
    }
    $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
    $tmpl['template'] = 'single';
    if ($tmpl['template']) {
      $data['template'] = $data['template'];
    }

    $data_child = PostModel::where('post_parent', $data['id'])->paginate(12);
    $post_id = $data->id;
    $documents = PostDocModel::where('post_id', $data['id'])->orderBy('ordering', 'desc')->paginate(10);
    $category = PostCategoryModel::all();

    return view('themes.default.' . $data['template'] . '', compact('data', 'data_child', 'documents', 'category'));
  }

  public function pagedetail_child($parenturi, $uri)
  {
    $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
    $tmpl['template'] = 'single';
    if ($tmpl['template']) {
      $data['template'] = $data['template'];
    }
    $data_child = PostModel::where('id', $data['post_parent'])->first();
    if ($data_child) {

      $data['template'] = $data_child['template_child'];
    }

    $data_child2 = PostModel::where('post_parent', $data['id'])->paginate(12);
    $post_id = $data->id;
    $downloads = PostDocModel::where('post_id', $post_id)->get();

    return view('themes.default.' . $data['template'] . '', compact('data', 'data_child', 'data_child2', 'downloads'));
  }


  public function add_comments(Request $request)
  {
    $news = NewsModel::find($request->id);
    $comment = new CommentModel();
    $comment->comment = $request->comment;
    $news->comments()->save($comment);
    return redirect()->back();
  }

  public function profile($uri)
  {
    $id = ContentWriterModel::where('uri', $uri)->first()->id;
    $data = NewsModel::where(['status' => '1', 'content_writer' => $id])->orderBy('ordering', 'desc')->paginate(12);
    $writer = ContentWriterModel::where('id', $id)->first();
    return view('themes.default.profile', compact('data', 'writer'));
  }
}
