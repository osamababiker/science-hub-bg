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
            <!-- Orders accordion-->
            <section class="card border-0 mb-4" id="tables-color-borders">
              <div class="card-body pb-0">
                <h2 class="h4 mb-n2">Messages list</h2>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="preview8" role="tabpanel">
                  <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>name</th>
                      <th>email</th>
                      <th>Phone</th>
                      <th>plan</th>
                      <th>message</th>
                      <th>Created at</th>
                      <th>Settings</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($messages as $message)
                    <tr>
                      <td>{{ $message->name }}</td>
                      <td>{{ $message->email }}</td>
                      <td>{{ $message->phone }}</td>
                      <td>{{ $message->plan }}</td>
                      <td>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#messageModal_{{ $message->id }}" href="#"> <i class="ai-messages text-primary"></i> </a>
                      </td>
                      <td>{{ $message->created_at->diffForHumans() }}</td>
                      <td>
                        <a  type="button" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $message->id }}" href="#"> <i class="ai-trash text-primary"></i> </a>
                      </td>
                    </tr>
                    <!-- Delete modal -->
                    <div id="deleteModal_{{ $message->id }}" class="modal" tabindex="-1" role="dialog">
                      <div class="modal-dialog modal-lg"  role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4> Delete message </h4>
                            <button class="btn-close text-primary" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body tab-content">
                            <h3> Are you sure you want to delete this message ? </h3>
                            <form autocomplete="off" id="deleteForm_{{ $message->id }}" method="post" action="{{ route('admin.messages.destroy', ['message' => $message->id]) }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" form="deleteForm_{{ $message->id }}" class="btn btn-primary">Yes sure</button>
                              <button type="button" data-bs-dismiss="modal"  class="btn btn-dark"> No thanks </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End delete modal -->

                    <!-- message modal -->
                    <div id="messageModal_{{ $message->id }}" class="modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg"  role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="btn-close text-primary" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body tab-content">
                                    <p> {!! $message->message !!} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- message modal -->
                    @endforeach
                  </div>
                  </tbody>
                </table>
                </div>
                  </div>
                </div>
              </div>
            </section>
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