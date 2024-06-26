@extends('master.app')

@section('title')
    {{ $title }}
@endsection
@section('breadcrump')
    Doctor Profile
@endsection

@section('content')
<div class="row">
<div class="col-md-3">

  <!-- Profile Image -->
  <div class="card card-primary card-outline">
    <div class="card-body box-profile">
      {{-- <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
             src="../../dist/img/user4-128x128.jpg"
             alt="User profile picture">
      </div> --}}

      <h3 class="profile-username text-center">{{ $doctor->name }}</h3>

      <p class="text-muted text-center">{{ $doctor->speciality }}</p>

      <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
          <b>Phone</b> <a class="float-right">{{ $doctor->phone }}</a>
        </li>
        <li class="list-group-item">
          <b>Address</b> <a class="float-right">{{ $doctor->address }}</a>
        </li>
        <li class="list-group-item">
          <b>Email</b> <a class="float-right">{{ $doctor->email }}</a>
        </li>
        <li class="list-group-item">
          <b>Chamber Timing</b> <a class="float-right">{{ $doctor->timing }}</a>
        </li>
        <li class="list-group-item">
          <b>Max Patient</b> <a class="float-right">{{ $doctor->patient_per_day }}</a>
        </li>
      </ul>

      {{-- <a href="{{ url('doctor/'.$doctor->id.'/edit') }}" class="btn btn-primary btn-block"><b>UPDATE</b></a> --}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</div>
<!-- /.col -->
<div class="col-md-9">
  <div class="card">
    <div class="card-header p-2" style="display: none">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <div class="post">
            {{-- <div class="user-block">
              <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
              <span class="username">
                <a href="#">Jonathan Burke Jr.</a>
                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
              </span>
              <span class="description">Shared publicly - 7:30 PM today</span>
            </div> --}}

            <!-- /.user-block -->
            <div class="user-block">
              <span class="username">
              <a href="#"> Description</a>
              </span>
            </div>
            <p>
              {!! $doctor->description !!}
            </p>

            {{-- <p>
              <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
              <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
              <span class="float-right">
                <a href="#" class="link-black text-sm">
                  <i class="far fa-comments mr-1"></i> Comments (5)
                </a>
              </span>
            </p> --}}

            {{-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> --}}
          </div>
          <!-- /.post -->

        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="timeline">
          <!-- The timeline -->
          <div class="timeline timeline-inverse">
            <!-- timeline time label -->
            <div class="time-label">
              <span class="bg-danger">
                10 Feb. 2014
              </span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
              <i class="fas fa-envelope bg-primary"></i>

              <div class="timeline-item">
                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                <div class="timeline-body">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                  quora plaxo ideeli hulu weebly balihoo...
                </div>
                <div class="timeline-footer">
                  <a href="#" class="btn btn-primary btn-sm">Read more</a>
                  <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
              </div>
            </div>
            <!-- END timeline item -->
            <!-- timeline item -->
            <div>
              <i class="fas fa-user bg-info"></i>

              <div class="timeline-item">
                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                </h3>
              </div>
            </div>
            <!-- END timeline item -->
            <!-- timeline item -->
            <div>
              <i class="fas fa-comments bg-warning"></i>

              <div class="timeline-item">
                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                <div class="timeline-body">
                  Take me to your leader!
                  Switzerland is small and neutral!
                  We are more like Germany, ambitious and misunderstood!
                </div>
                <div class="timeline-footer">
                  <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                </div>
              </div>
            </div>
            <!-- END timeline item -->
            <!-- timeline time label -->
            <div class="time-label">
              <span class="bg-success">
                3 Jan. 2014
              </span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
              <i class="fas fa-camera bg-purple"></i>

              <div class="timeline-item">
                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                <div class="timeline-body">
                  <img src="http://placehold.it/150x100" alt="...">
                  <img src="http://placehold.it/150x100" alt="...">
                  <img src="http://placehold.it/150x100" alt="...">
                  <img src="http://placehold.it/150x100" alt="...">
                </div>
              </div>
            </div>
            <!-- END timeline item -->
            <div>
              <i class="far fa-clock bg-gray"></i>
            </div>
          </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
          <form class="form-horizontal">
            <div class="form-group row">
              <label for="inputName" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputName" placeholder="Name">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName2" placeholder="Name">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div><!-- /.card-body -->
  </div>
  <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
@endsection