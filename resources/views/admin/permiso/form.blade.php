<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre',$data->nombre ??  '') }}" required/>
    </div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label for="slug" class="col-lg-3 control-label requerido">Slug</label>
    <div class="col-lg-8">
      <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug',$data->slug ??  '') }}" required/>
    </div>
  </div>