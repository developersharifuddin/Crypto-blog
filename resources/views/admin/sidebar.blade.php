  @php
  $company_information = DB::table('company_information')
  ->select('company_information.company_logo','company_information.company_name',)->first();
  @endphp


<style>
    a, i, .a,  span{
        font-size: 13px !important
    }
</style>

  <aside class="main-sidebar sidebar-dark-primary elevation-4 shadow-none border-0">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link text-decoration-none" target="_blank">
      @if(isset($company_information->company_logo))
      <img src="{{asset('uploads/companyLogo/'.$company_information->company_logo)}}" alt=" Admin Logo" class="brand-image" style="border-radius:5px; width:35px">
      @endif
      <span class="brand-text font-weight-light">Visite Website</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar shadow-none border-0">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{url('/dashboard')}}" class="nav-link {{Request::is('dashboard*') || Request::is('admin*')  ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{url('/post')}}" class="nav-link {{Request::is('post*') ? 'active' : '' }}" title="post">
              <i class="nav-icon fas fa-book"></i>
              <p>Post</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('post.trashList') }}" class="nav-link {{Request::is('post/trashed/list') ? 'active' : '' }}" title="size">
              <i class="nav-icon fas fa-book"></i>
              <p>Trash List</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/love')}}" class="nav-link {{Request::is('love*') ? 'active' : '' }}" title="size">
              <i class="nav-icon fas fa-book"></i>
              <p>Love</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/comment')}}" class="nav-link {{Request::is('comment*') ? 'active' : '' }}" title="color">
              <i class="nav-icon fas fa-book"></i>
              <p>Comment</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/comments')}}" class="nav-link {{Request::is('comments*') ? 'active' : '' }}" title="size">
              <i class="nav-icon fas fa-book"></i>
              <p>Comment of Comment</p>
            </a>
          </li>




          <li class="nav-item">
            <a href="{{ url('/contactData') }}" class="nav-link {{Request::is('contactData') ? 'active' : '' }}" title="size">
              <i class="nav-icon fas fa-book"></i>
              <p>Contact List</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/visitors') }}" class="nav-link {{Request::is('visitors') ? 'active' : '' }}" title="visitors">
              <i class="nav-icon fas fa-book"></i>
              <p>Visitors List</p>
            </a>
          </li>


          <span class="pt-2">Pages Management</span>
          <hr>


          <li class="nav-item">
            <a href="{{url('/company_information')}}" class="nav-link {{Request::is('company_information*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Company information
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
