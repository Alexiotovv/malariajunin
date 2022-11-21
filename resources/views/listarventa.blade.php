@extends('layouts.base')
@section('aditional_link')
	<link rel="stylesheet" type="text/css" href="../../../assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" type="text/css" href="../../../assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
@endsection
@section('content')

	<div class="content-body">
		<!-- Ajax Sourced Server-side -->
		<section >
			<div class="row">
				<div class="col-12">
					<div class="card" style="text-align: center">
						<div class="card-header border-bottom">
							<h4 class="card-title">FICHA FAMILIAR</h4>
						</div>
						<div class="">
							<table class="table table-flush" id="listausuarios">
								<thead class="thead-light">
									<tr>
										<th>Id</th>
										<th>Acciones</th>
										<th>Nombre</th>
									</tr>
								</thead>
								<tbody>
									{{-- <tr>
										<td>34</td>
										<td>asdasd</td>
										<td>Julio</td>
									</tr> --}}
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!--/ Ajax Sourced Server-side -->

	</div>
	@section('code_js')
		<script>
			$("#listausuarios").DataTable({
				"ajax":"datosventas",
				"method":"GET",
				"columns":[
					{data:"numDoc"},
					{data:"direccion"},
					{data:"provincia"},
				],
				dom: 'Bfrtip',
			});
		</script>
	@endsection

@endsection
