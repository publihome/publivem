
<div class="col-md-2">
    <div class="form-group">
        <label for="order">Orden</label>
        <input type="number" class="form-control" id="order" name="order" >
    </div>
</div>

<div class="col-md-3">
    <div class="form-group">
        <label for="category_id">Categoria de producto</label>
        <select name="category_id" id="category_id" class="form-select">
            <option value="">Selecciona una categoria</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
</div> 

<div class="col-md-3">
    <div class="form-group">
        <label for="client_name">Cliente</label>
        <input type="text" class="form-control" id="client_name" name="client_name" >
    </div>
</div>




<div class="col-md-3">
    <div class="form-group">
        <label for="product">Producto</label>
        <select name="product_id" id="product_id" class="form-select">
            <option value="">Selecciona una categoria</option>
                
        </select>
        {{-- <input type="text" class="form-control" id="product" name="product"> --}}
    </div>
</div>

<div class="col-md-2" id="heightDiv">
    <div class="form-group">
        <label for="height">Alto</label>
        <input type="text" class="form-control" id="height" name="height">
    </div>
</div>

<div class="col-md-2" id="widthDiv">
    <div class="form-group">
        <label for="width">Ancho</label>
        <input type="text" class="form-control" id="width" name="width">
    </div>
</div>

<div class="col-md-1">
    <div class="form-group">
        <label for="amount">Cantidad</label>
        <input type="number" class="form-control" id="amount" name="amount">
    </div>
</div>


<div class="col-md-3">
    <div class="form-group">
        <label for="client">Vendedor</label>
        <select name="employe_id" class="form-select" id="employe_id">
            @if (collect($employees)->isEmpty())
                <option value="">Primero debes agregar a los empleados</option>
            @else
                <option value="">Selecciona un vendedor</option>
                @foreach ($employees as $employe)
                    <option value="{{$employe->id}}">{{ $employe->name }}  {{ $employe->lastname }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="col-md-3">
    <div class="form-group">
        <label for="payment_format">forma de pago</label>
        <input type="text" class="form-control" id="payment_format" name="payment_format">
    </div>
</div>

<div class="col-md-3">
    <div class="form-group">
        <label for="advance">Adelanto</label>
        <input type="text" class="form-control" id="advance" name="advance">
    </div>
</div>

<div class="col-md-2 d-none" id="both_sidesDiv">
    <div class="form-group">
        <label for="both_sides">Ambos lados</label>
        <select class="form-select" name="sides" id="both_sides">
            <option value="">Selecciona</option>
            <option value="1">No</option>
            <option value="2">Si</option>
        </select>
    </div>
</div>

<hr class="my-3">
<h5>Acabados</h5>


