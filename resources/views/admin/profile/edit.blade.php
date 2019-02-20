@extends('layouts.profile')
@section('title','profileの編集')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>Profile</h2>
        <form action="{{ action('Admin\ProfileController@update') }}"
        method="post" enctype="multipart/form-data">
          @if (count($errors) >0 )
            <ul>
              @foreach($errors->all() as $e )
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif
          <div class="form-grouprow">
            <label class="col-md-2" for="name">name</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
          </div>

          <div class="form-grouprow">
            <label class="col-md-2" for="gender">gender</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
            </div>
          </div>

          <div class="form-grouprow">
            <label class="col-md-2" for="hobby">hobby</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
            </div>
          </div>

          <div class="form-grouprow">
            <label class="col-md-2" for="introduction">introduction</label>
            <div class="col-md-10">
              <textarea class="form-control" name="introduction"
              rows="20">{{ old('introduction') }}</textarea>
            </div>
          </div>
          <div class="form-grouprow">
            <div class="col-md-10">
              <input type="hidden" name="id" value="{{ $profile_form->id }}">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="更新">
            </div>
          </div>
        </form>
        <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profile_form->histories != NULL)
                                @foreach ($profile_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
      </div>
    </div>
  </div>
  @endsection
©
