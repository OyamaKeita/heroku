@extends('layouts.profile')
@section('title.'プロフィール')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <h2>Profile</h2>
          <form action="{{action('Admin\Profileontroller@update') }}"
          method="post"
          enctype="multipart/form-data">
            @if (count($errors) > 0)
                <ul>
                  @foreach($errors->all() as $e)
                      <li>{{ $e }}</li>
                  @endforeach
                </ul>
              @endif
              <div class="form-groupe row">
                <label class="col-md-2" for="title">name</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="title"
                  value="{{ $profile_form->title }}">
                </div>
              </div>
                <div class="form-groupe row">
                  <label class="col-md-2" for="title">gender</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="body" rows="20">{{ $profile_form->body }}</textarea>
                  </div>
                </div>
              </div>
                <div class="form-groupe row">
                  <label class="col-md-2" for="title">hobby</label>
                  <div class="col-md-10">
                    <textarea class="form-control" name="body" rows="20">{{ $profile_form->body }}</textarea>
                  </div>
                </div></div>
                  <div class="form-groupe row">
                    <label class="col-md-2" for="body">introduction</label>
                    <div class="col-md-10">
                      <textarea class="form-control" name="body" rows="20">{{ $profile_form->body }}</textarea>
                    </div>
                  </div>
                <div class="form-groupe row">
                  <label class="col-md-2" for="image">画像
                  </label>
                  <div class="col-md-10">
                    <input type="file" class="form-control-file" name="image">
                    <div class="form-text text-info">
                      設定中: {{ $profile_form->image_path }}
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                      </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-groupe row">
                    <div class="col-md-10">
                      <input type="hidden" name="id" value="{{ $news_form->id }}">
                      {{ csrf_field() }}
                      <input type="submit" class="btn btn-primary" value="更新">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @endsection
