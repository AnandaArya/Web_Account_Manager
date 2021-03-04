@extends('layouts/main')
@section('php')
<?php 
	use App\Email;
	use App\Game;
	use App\Web;

	$totalEmails = Email::where('users_id', auth()->user()->id)->count();
	$totalGames = Game::where('users_id', auth()->user()->id)->count();
	$totalWebs = Web::where('users_id', auth()->user()->id)->count();

	$totalAccounts = $totalEmails + $totalGames + $totalWebs;

?>
@endsection


@section('css-libraries')
<!-- CSS Libraries -->
@endsection

@section('header-title', 'Dashboard')

@section('content-body')
		<!-- <div class="main-content"> -->
			<section class="section">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-success">
								<i class="fas fa-circle"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Total Akun</h4>
								</div>
								<div class="card-body">
									{{ $totalAccounts }}
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-primary">
								<i class="far fa-envelope"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Akun Email</h4>
								</div>
								<div class="card-body">
									{{ $totalEmails }}
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-danger">
								<i class="fas fa-gamepad"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Akun Game</h4>
								</div>
								<div class="card-body">
									{{ $totalGames }}
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-warning">
								<i class="fab fa-chrome"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Akun Web</h4>
								</div>
								<div class="card-body">
									{{ $totalWebs }}
								</div>
							</div>
						</div>
					</div>

				<!-- </div> -->
@endsection