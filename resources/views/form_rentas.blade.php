<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro de Renta</title>
</head>
<body>

  @include('sidebar')
  <body oncopy="return false" onpaste="return false">

  <div class="form-container">
    <p class="title">Registro de Renta</p>
    <form action="{{ route('renta.insertarrentas') }}" method="post" enctype="multipart/form-data">
      @csrf

      <!-- Campo para la fecha de entrega -->
      <div class="input-group">
        <label for="fecha_entrega">Fecha de Entrega</label>
        <input type="datetime-local" name="fecha_entrega" id="fecha_entrega" required>
      </div>

      <!-- Campo para el número de celular -->
      <div class="input-group">
        <label for="celular">Número de Celular</label>
        <input type="tel" name="celular" id="celular" placeholder="Ingresa el número de celular" required pattern="[0-9]{10}">
      </div>

      <!-- Campo para la dirección -->
      <div class="input-group">
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" placeholder="Ingresa la dirección" maxlength="100" required>
      </div>

      <!-- Campo para el costo de la renta -->
      <div class="input-group">
        <label for="costo">Costo de la Renta</label>
        <input type="number" name="costo" id="costo" placeholder="Ingresa el costo" min="0" step="0.01" required>
      </div>

      <!-- SILLAS -->
      <div class="input-group">
        <h1 for="">Sillas</h1>
        <select name="fk_sillas" id="fk_sillas" required>
            @php
                    use App\Models\Sillas;
                    $datos_sillas = Sillas::select('sillas.*')->wherein('estatus_sillas', [1,2])->get();
            @endphp

            @foreach ($datos_sillas as $dato)
            <option value="{{$dato->pk_sillas}}">{{$dato->forma_sillas}}</option>
            @endforeach
        </select>
        <label for="">cantidad de sillas</label>
        <input type="number" name="cant_sillas_renta" id="cant_sillas_renta" value="0">
        <label for="">Audiencia</label>
        <select name="audiencia_sillas_renta" id="" >
        <option value="">Selecciona una opción</option>
            @php
                    $datos_audiencia_sillas = Sillas::select('sillas.*')->wherein('estatus_sillas', [1])->get();
            @endphp

            @foreach ($datos_audiencia_sillas as $dato)
            <option value="{{$dato->pk_sillas}}">{{$dato->audiencia_sillas}}</option>
            @endforeach
        </select>
      </div>

      <!-- MESAS -->
      <div class="input-group">
        <h1 for="">Mesas</h1>
        <select name="fk_mesas" id="fk_mesas" required>
            @php
                    use App\Models\Mesas;
                    $datos_mesas = Mesas::select('mesas.*')->wherein('estatus_mesas', [1,2])->get();
            @endphp

            @foreach ($datos_mesas as $dato)
            <option value="{{$dato->pk_mesas}}">{{$dato->forma_mesas}}</option>
            @endforeach
        </select>
        <label for="">cantidad de mesas</label>
        <input type="number" name="cant_mesas_renta" id="cant_mesas_renta" value="0">
        <label for="">Audiencia</label>
        <select name="audiencia_mesas_renta" id="audiencia_mesas_renta" >
        <option value="">Selecciona una opción</option>
            @php
                    $datos_audiencia_mesas = Mesas::select('mesas.*')->wherein('estatus_mesas', [1])->get();
            @endphp

            @foreach ($datos_audiencia_mesas as $dato)
            <option value="{{$dato->pk_mesas}}">{{$dato->audiencia_mesas}}</option>
            @endforeach
        </select>
      </div>

      <!-- MANTELES -->
      <div class="input-group">
        <h1 for="">Manteles</h1>
        <select name="fk_manteles" id="fk_manteles" required>
            @php
                    use App\Models\Manteles;
                    $datos_manteles = Manteles::select('manteles.*')->wherein('estatus_manteles', [1,2])->get();
            @endphp

            @foreach ($datos_manteles as $dato)
            <option value="{{$dato->pk_manteles}}">{{$dato->color_manteles}}</option>
            @endforeach
        </select>
        <label for="">cantidad de manteles</label>
        <input type="number" name="cant_manteles_renta" id="cant_manteles_renta" value="0">
        <label for="">tipo de mantel</label>
        <select name="tipo_manteles_renta" id="tipo_manteles_renta">
        <option value="">Selecciona una opción</option>
            @php
                    $datos_tipo_manteles = Manteles::select('manteles.*')->wherein('estatus_manteles', [1])->get();
            @endphp

            @foreach ($datos_tipo_manteles as $dato)
            <option value="{{$dato->pk_manteles}}}}">{{$dato->tipo_manteles}}</option>
            @endforeach
        </select>

      <!-- BRNCOLINES -->
      <div class="input-group">
        <h1 for="">Brincolines</h1>
        <select name="fk_brincolines" id="fk_brincolines" required>
            @php
                    use App\Models\Brincolines;
                    $datos_brincolines = Brincolines::select('brincolines.*')->wherein('estatus_brincolines', [1,2])->get();
            @endphp

            @foreach ($datos_brincolines as $dato)
            <option value="{{$dato->pk_brincolines}}">{{$dato->nombre_brincolines}}</option>
            @endforeach
        </select>
        <label for="">categoria de brincolines</label>
        <select name="cat_brincolines_renta" id="cat_brincolines_renta">
        <option value="">Selecciona una opción</option>
            @php
                    $datos_categoria_brincolines = Brincolines::select('brincolines.*')->wherein('estatus_brincolines', [1])->get();
            @endphp

            @foreach ($datos_categoria_brincolines as $dato)
            <option value="{{$dato->pk_brincolines}}">{{$dato->cat_brincolines}}</option>
            @endforeach
        </select>
        <label for="">Tamano brincolin</label>
        <select name="tam_brincolines_renta" id="tam_brincolines_renta" >
        <option value="">Selecciona una opción</option>
            @php
                    $datos_tamano_brincolines = Brincolines::select('brincolines.*')->wherein('estatus_brincolines', [1])->get();
            @endphp

            @foreach ($datos_tamano_brincolines as $dato)
            <option value="{{$dato->pk_brincolines}}">{{$dato->tam_brincolines}}</option>
            @endforeach
        </select>
      </div>

      <!-- MOTORES -->
      <div class="input-group">
        <h1 for="">Motores</h1>
        <select name="fk_motores" id="fk_motores" required>
            @php
                    use App\Models\Motores;
                    $datos_motores = Motores::select('motores.*')->wherein('estatus_motores', [1,2])->get();
            @endphp

            @foreach ($datos_motores as $dato)
            <option value="{{$dato->pk_motores}}">{{$dato->color_motores}}</option>
            @endforeach
        </select>
      </div>

      <!-- EXTENCIONES -->
      <div class="input-group">
        <h1 for="">Extenciones</h1>
        <select name="fk_extenciones" id="fk_extenciones" required>
            @php
                    use App\Models\Extenciones;
                    $datos_Extenciones = Extenciones::select('extenciones.*')->wherein('estatus_extenciones', [1,2])->get();
            @endphp

            @foreach ($datos_Extenciones as $dato)
            <option value="{{$dato->pk_extenciones}}">{{$dato->nombre_extenciones}}</option>
            @endforeach
        </select>
      </div>

      <!-- Botón para enviar el formulario -->
      <div class="input-group">
        <button class="sign">Registrar Renta</button>
      </div>

    </form>
  </div>

  @include('fooder')

</body>
</html>
