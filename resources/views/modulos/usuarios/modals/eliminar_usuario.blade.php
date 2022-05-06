
<!-- Modal -->
<div class="modal fade" id="eliminar-{{$usuario->id}}">
	<div class="modal-dialog ">
		<div class="modal-content border-danger">
			<div class="modal-header bg-danger">
				<h5 class="modal-title text-white">ELIMINAR USUARIO</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<p>Esta seguro de eliminar este usuario ? </p>
					</div>

				</div> <!--end row -->
			</div><!--edn modal-body-->
			<div class="modal-footer">
				<button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

				<a href="/usuarios/delete/delete-{{$usuario->id}}" class="btn btn-danger"><i class="fa fa-check-square-o"></i> ELIMINAR</a>
			</div>
		</div>
	</div>
</div>