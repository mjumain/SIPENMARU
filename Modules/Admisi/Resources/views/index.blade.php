@extends('admisi::layouts.master')
@push('css')
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Selamat datang {{ ucwords(auth()->user()->name) }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Proses Pendaftaran Calon Mahasiswa Baru</h5>
                        </div>
                        <div class="card-body">
                            <div class="timeline">

                                <div class="time-label">
                                    @if (auth()->user()->created_at)
                                        <span class="bg-green">{{ auth()->user()->created_at }}</span>
                                    @else
                                        <span class="bg-red">{{ auth()->user()->created_at }}</span>
                                    @endif
                                </div>
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border"><a href="#">Anda telah melakukan pendaftaran akun</a></h3>
                                    </div>
                                </div>


                                <div>
                                    <i class="fas fa-comments bg-yellow"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post
                                        </h3>
                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-warning btn-sm">View comment</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="time-label">
                                    <span class="bg-green">3 Jan. 2014</span>
                                </div>


                                <div>
                                    <i class="fa fa-camera bg-purple"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                                        <div class="timeline-body">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                            <img src="https://placehold.it/150x100" alt="...">
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <i class="fas fa-video bg-maroon"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>
                                        <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>
                                        <div class="timeline-body">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item"
                                                    src="https://www.youtube.com/embed/tMWkeBIohBs"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
