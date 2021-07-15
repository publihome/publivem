<!-- Modal -->
<div class="modal fade" id="modalSale" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalTitle">Agregar cantidad</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('sales/'.$sale->id)}}" method="post" >
                @csrf
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="text" class="form-control" name="advance" id="advance" >
                </div>
                
            </div>
            <div class="modal-footer">
                <button  type="submit" class="btn btn-success">Agregar</button>
            </div>
            </form>
      </div>
    </div>
  </div>