@include('frontend/layouts/head')
@include('frontend/layouts/header')
    	<!-- Page section -->
	<section class="page-section recent-game-page spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
                        @foreach ($datateam as $team)
						<div class="col-md-6">
							<div class="recent-game-item">
<<<<<<< Updated upstream
								<div class="rgi-thumb set-bg" data-setbg="{{asset('frontend/img/team4.jpg')}}">
=======
								<div class="rgi-thumb set-bg" data-setbg="{{asset('frontend/img/recent-game/1.jpg')}}">
>>>>>>> Stashed changes
									<div class="cata new">{{$team->nama_game}}</div>
								</div>
								<div class="rgi-content">
									<h5><a href="{{route('allteam.show',$team->id_team)}}">{{$team->nama_team}}</a></h5>
									<p>Coach : {{$team->name}} </p>
									<a href="#" class="comment">Jumlah Anggota : {{$team->total_player}}</a>
								</div>
							</div>	
						</div>
                        @endforeach
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-lg-4 col-md-7 sidebar pt-5 pt-lg-0">
					<!-- widget -->
					<div class="widget-item">
						<form class="search-widget">
							<input type="text" placeholder="Search">
							<button><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- widget -->
					<div class="widget-item">
						<h4 class="widget-title">Latest Player</h4>
						<div class="latest-blog">
                            @foreach ($playerfoot as $p)
                            <div class="lb-item">
								<div class="lb-thumb set-bg" data-setbg="{{asset('images/'.$p->foto)}}"></div>
								<div class="lb-content">
									<div class="lb-date">{{$p->name}}</div>
									<p>Game : {{$p->nama_game}}</p>
<<<<<<< Updated upstream
									<a href="#" class="lb-author">{{$p->nama_team}}</a>
=======
									<p class="lb-author">{{$p->nama_team}}</p>
>>>>>>> Stashed changes
								</div>
							</div>
                            @endforeach
						</div>
					</div>
					<!-- widget -->
					<div class="widget-item">
						<div class="review-item">
                            @foreach ($tour as $t)
                                <div class="review-cover set-bg" data-setbg="{{asset('images/'.$t->gambar)}}">
                                </div>
                                <div class="review-text">
                                    <h5>{{$t->nama_event}}</h5>
                                    <p>{{$t->nama_game}}</p>
<<<<<<< Updated upstream
									<p>{{$t->price}}</p>
=======
									<p>Prize : {{$t->price}}</p>
>>>>>>> Stashed changes
                                </div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page section end -->
@include('frontend/layouts/latest')
@include('frontend/layouts/footer')