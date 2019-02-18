<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
  public function add(){

  return view('admin.profile.create');
}
public function create(Request $request)
{
  $this->validate($request, Profile::rules);

  $profile = new Profile;
      $form = $request->all();

      // formに画像があれば、保存する
      if ($form['image']) {
        $path = $request->file('image')->store('public/image');
        $profile->image_path = basename($path);
      } else {
          $profile->image_path = null;
      }

      unset($form['_token']);
      unset($form['image']);
      // データベースに保存する
      $profile->fill($form);
      $profile->save();

      return redirect('admin/profile/create');
  }

  public function edit(Request $request)
  {
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);
      }
      return view('admin.profile.edit', ['news_form' => $profile]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      if (isset($profile_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $profile->image_path = basename($path);
      } else {
          $profile->image_path = null;
      }
      // \Debugbar::info(isset($profile_form['image']));
      unset($profile_form['_token']);
      unset($profile_form['image']);

      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();
  return redirect('admin/profile');
}
public function edit()
{
  return view('admin.profile.edit');
}
public function update()
{
  return redirect('admin/profile/edit');
}
}
