<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name">
</div>

<div class="form-group">
    <label for="papel_id">Tipo de papel</label>
    <select name="papel_id" id="papel_id" class="form-select">
        <option value="">Selecciona un tipo de papel</option>
        @foreach ($papers as $paper)
            <option value="{{$paper->id}}">{{$paper->name}}</option>
            
        @endforeach
    </select>
</div>
<hr>
<h6 class="text-center text-success">Precio menudeo</h6>
<div class="form-group">
    <label for="price_front_men">Precio de frente</label>
    <input type="text" class="form-control" id="price_front_men" name="price_front_men">
</div>


<div class="form-group">
    <label for="price_both_sides_men">Precio de ambos lados</label>
    <input type="text" class="form-control" id="price_both_sides_men" name="price_both_sides_men">
</div>

<hr>
<h6 class="text-center text-success">Precio mayoreo</h6>

<div class="form-group">
    <label for="price_front_may">Precio de frente</label>
    <input type="text" class="form-control" id="price_front_may" name="price_front_may">
</div>


<div class="form-group">
    <label for="price_both_sides_may">Precio de ambos lados</label>
    <input type="text" class="form-control" id="price_both_sides_may" name="price_both_sides_may">
</div>

<div class="form-group">
    <label for="unit">Unidad</label>
    <input type="text" class="form-control" id="unit" name="unit">
</div>

<div class="form-group">
    <label for="pieces_may">Mayoreo a partir de:</label>
    <input type="number" class="form-control" id="pieces_may" name="pieces_may">
</div>
