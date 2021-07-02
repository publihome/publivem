<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formAddProduct" class="form">             
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control">
              </div>

                <div class="form-group">
                  <label for="price_men">Precio</label>
                  <input type="text" name="price_men" id="price_men" class="form-control">
              </div>
              
              <div class="form-group">
                  <label for="unit">Unidad</label>
                  <input type="text" name="unit" id="unit" class="form-control">
              </div>

                @if($categoryName[0] == "Impresión en gran formato" || $categoryName[0] == "Impresión en alta deficion, con tintas ecológicas" || $categoryName[0] == "Instalación de vinil, vinil microperforado y vinil de corte")
                @include('template.forms.impresionForm')
                    
                @elseif($categoryName[0] == "Instalación de vinil, vinil microperforado y vinil de corte en superficies")
                @include('template.forms.instalacionForm')
                    
                @endif

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>

      </div>
    </div>
  </div>

<script src="{{asset('js/products.js')}}"></script>
