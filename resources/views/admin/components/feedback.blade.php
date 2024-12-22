@if(session()->has('feedback'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <i class="ai-circle-info fs-xl pe-1 me-2"></i> {{session()->get('feedback')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif