@extends('components/layout')
@section('title', 'Admin Panel' )
@section('content')
  <!-- Page content-->
  <div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
    <div class="row pt-sm-2 pt-lg-0">
      <!-- Sidebar (offcanvas on sreens < 992px)-->
      @include('admin/components/sidebar')
      <!-- Page content-->
      <div class="col-lg-9 pt-4 pb-2 pb-sm-4">
        <div class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4">
          <div class="card-body pb-4">
            <!-- Feedback -->
            @include('admin/components/feedback')
            <div class="">
            <form autocomplete="off" method="post" action="{{ route('admin.courses.update', ['course' => $course->id]) }}"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 mb-sm-4">
                <label for="en_name" class="form-label">course name (english)</label>
                <input type="text" name="en_name" value="{{ $course->en_name }}" class="form-control" id="en_name" placeholder="Enter course name in english">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="ar_name" class="form-label">course name (arabic)</label>
                <input type="text" name="ar_name" value="{{ $course->ar_name }}" class="form-control" id="ar_name" placeholder="Enter course name in arabic">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="rating" class="form-label">course rating</label>
                <input type="text" name="rating"  value="{{ $course->rating }}" class="form-control" id="rating" placeholder="Enter course rating">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="rating_count" class="form-label"> rating count </label>
                <input type="number" name="rating_count" value="{{ $course->rating_count }}" class="form-control" id="rating count" placeholder="Enter course rating count">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="lesson_count" class="form-label">course lesson count</label>
                <input type="number" name="lesson_count" value="{{ $course->lesson_count }}" class="form-control" id="lesson_count" placeholder="Enter course lesson count">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="duration" class="form-label">course duration</label>
                <input type="text" name="duration" value="{{ $course->duration }}" class="form-control" id="duration" placeholder="Enter course duration">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="level_en" class="form-label">course level (english)</label>
                <input type="text" value="{{ $course->level_en }}"  name="level_en" class="form-control" id="level_en" placeholder="Enter course level">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="level_ar" class="form-label">course level (arabic)</label>
                <input type="text" value="{{ $course->level_ar }}"  name="level_ar" class="form-control" id="level_ar" placeholder="Enter course level">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="original_price" class="form-label">course original price</label>
                <input type="text" name="original_price" value="{{ $course->original_price }}" class="form-control" id="original_price" placeholder="Enter course original price">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="discounted_price" class="form-label">course discounted price</label>
                <input type="text" name="discounted_price" value="{{ $course->discounted_price }}" class="form-control" id="discounted_price" placeholder="Enter course discounted price">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="language_en" class="form-label">course language (english)</label>
                <input type="text" name="language_en" value="{{ $course->language_en }}" class="form-control" id="language_en" placeholder="Enter course languange">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="language_ar" class="form-label">course language (arabic)</label>
                <input type="text" name="language_ar" value="{{ $course->language_ar }}" class="form-control" id="language_ar" placeholder="Enter course languange">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="difficulty_en" class="form-label">course difficulty (english)</label>
                <input type="text" name="difficulty_en" value="{{ $course->difficulty_en }}" class="form-control" id="difficulty_en" placeholder="Enter course difficulty">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="difficulty_ar" class="form-label">course difficulty (arabic)</label>
                <input type="text" name="difficulty_ar" value="{{ $course->difficulty_ar }}" class="form-control" id="difficulty_ar" placeholder="Enter course difficulty">
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="sub_of" class="form-label">course Category</label>
                <select name="sub_of" id="sub_of" class="form-control">
                    <option value="{{ $course->category->id }}">{{ $course->category->en_name }}</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->en_name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="teacher_id" class="form-label">course Teacher</label>
                <select name="teacher_id" id="teacher_id" class="form-control">
                  <option value="{{ $course->teacher->id }}">{{ $course->teacher->en_name }}</option>
                    @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->en_name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3 mb-sm-4">
                <label for="image" class="form-label">course Image</label>
                <input type="file" name="image" class="form-control" id="image">
                </div>
                <div class="mb-3 mb-sm-4">
                  <label for="en_desc" class="form-label">course description (english)</label>
                  <textarea name="en_desc" id="en_desc" cols="8" rows="8" class="form-control tiny-editor">{{ $course->en_desc }}</textarea>
                </div>
                <div class="mb-3 mb-sm-4">
                  <label for="ar_desc" class="form-label">course description (arabic)</label>
                  <textarea name="ar_desc" id="ar_desc" cols="8" rows="8" class="form-control tiny-editor">{{ $course->ar_desc }}</textarea>
                </div>
                <div class="mb-3 mb-sm-4">
                  <label for="page_description" class="form-label">Page description</label>
                  <textarea name="page_description" id="page_description" cols="8" rows="8" class="form-control">{{ $course->page_description }}</textarea>
                </div>
                <div class="mb-3 mb-sm-4">
                  <label for="page_key_words" class="form-label">Page key words</label>
                  <textarea name="page_key_words" id="page_key_words" cols="8" rows="8" class="form-control">{{ $course->page_key_words }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Edit Details</button>
            </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Divider for dark mode only-->
  <hr class="d-none d-dark-mode-block">
  <!-- Sidebar toggle button-->
  <button class="d-lg-none btn btn-sm fs-sm btn-primary w-100 rounded-0 fixed-bottom" data-bs-toggle="offcanvas" data-bs-target="#sidebarAccount"><i class="ai-menu me-2"></i>Account menu</button>
@endsection