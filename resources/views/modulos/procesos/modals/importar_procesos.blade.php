 <!-- Modal -->
 <div class="modal fade" id="importar_procesos">
  <div class="modal-dialog ">
   <div class="modal-content border-primary">
    <div class="modal-header bg-primary">
      <h5 class="modal-title text-white">Importar nuevos procesos</h5>
      <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form method="POST" action="{{route('importar_procesos')}}" enctype="multipart/form-data">
     <div class="modal-body">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <div class="row">
         <div class="form-group">
           <label for="input-1">Importar</label>
           <input type="file" class="form-control" 
           id="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
         </div>
       </div> <!--end row -->

     </div><!--edn modal-body-->
     <div class="modal-footer">
      <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
      <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Importar</button>
    </div>


  </form>
</div>
</div>
</div>