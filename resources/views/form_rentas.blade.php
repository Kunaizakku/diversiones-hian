<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro de Renta</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluye SweetAlert -->
</head>
<body>

  @include('sidebar')

  @if (session('success'))
    <script>
      Swal.fire({
        title: 'Éxito!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
    </script>
  @endif

  <div class="form-container-rentas">
    <p class="title">Registro de Renta</p>
    <form action="{{ route('renta.insertarrentas') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="form-flex">
        <div class="input-group form-half-50">
          <label for="direccion">Dirección</label>
          <input type="text" name="direccion" id="direccion" placeholder="Ingresa la dirección" maxlength="100" required>
        </div>
        <div class="input-group form-half-25">
          <label for="fecha_entrega">Fecha de Entrega</label>
          <input type="datetime-local" name="fecha_entrega" id="fecha_entrega" required>
        </div>
        <div class="input-group form-half-25">
          <label for="celular">Número de Celular</label>
          <input type="tel" name="celular" id="celular" placeholder="Ingresa el número de celular" required pattern="[0-9]{10}">
        </div>
        <div class="input-group form-half-25">
          <label for="costo">Costo de la Renta</label>
          <input type="number" name="costo" id="costo" placeholder="Ingresa el costo" min="0" step="0.01" required>
        </div>
      </div>

      <!-- Checkboxes para Sillas, Mesas, Manteles y Brincolines -->
      <div class="input-group">
        <label for="opciones_renta">Selecciona los elementos de renta - &nbsp;</label>
        <div class="checkbox-group">
          <div class="checkbox-item">
            <label for="sillas">Sillas:</label>
            <input type="checkbox" id="sillas" name="opciones_renta[]" value="sillas">
          </div>
          <div class="checkbox-item">
            <label for="mesas">Mesas</label>
            <input type="checkbox" id="mesas" name="opciones_renta[]" value="mesas">
          </div>
          <div class="checkbox-item">
            <label for="manteles">Manteles</label>
            <input type="checkbox" id="manteles" name="opciones_renta[]" value="manteles">
          </div>
          <div class="checkbox-item">
            <label for="brincolines">Brincolines</label>
            <input type="checkbox" id="brincolines" name="opciones_renta[]" value="brincolines">
          </div>
        </div>
      </div>

      <!-- Campos ocultos para Sillas -->
      <div id="sillas_inputs" class="hidden input-group">
        <h2>Sillas</h2>
        <label for="tipo_sillas_renta">Tipo de silla</label>
        <select name="fk_sillas">
          <option value="">Selecciona una opción</option>
        </select>
        <label for="cant_sillas_renta">Cantidad de sillas</label>
        <input type="number" name="cant_sillas_renta" id="cant_sillas_renta" value="0">
        <label for="audencia_sillas_renta">Audiencia</label>
        <select name="audencia_sillas_renta">
          <option value="">Selecciona una opción</option>
        </select>
      </div>

      <!-- Campos ocultos para Mesas -->
      <div id="mesas_inputs" class="hidden input-group">
        <h2>Mesas</h2>
        <label for="tipo_mesas_renta">Tipo de mesas</label>
        <select name="tipo_mesas_renta">
          <option value="">Selecciona una opción</option>
        </select>
        <label for="cant_mesas_renta">Cantidad de mesas</label>
        <input type="number" name="cant_mesas_renta" id="cant_mesas_renta" value="0">
        <label for="audencia_mesas_renta">Audiencia</label>
        <select name="audencia_mesas_renta">
          <option value="">Selecciona una opción</option>
        </select>
      </div>

      <!-- Campos ocultos para Manteles -->
      <div id="manteles_inputs" class="hidden input-group">
        <h2>Manteles</h2>
        <label for="tipo_manteles_renta">Tipo de mantel</label>
        <select name="tipo_manteles_renta">
          <option value="">Selecciona una opción</option>
        </select>
        <label for="cant_manteles_renta">Cantidad de manteles</label>
        <input type="number" name="cant_manteles_renta" id="cant_manteles_renta" value="0">
        <label for="tipo_manteles_renta">Tipo de mantel</label>
        <select name="tipo_manteles_renta">
          <option value="">Selecciona una opción</option>
        </select>
      </div>

      <!-- Campos ocultos para Brincolines -->
      <div id="brincolines_inputs" class="hidden input-group">
        <h2>Brincolines</h2>
        <label for="tipo_brincolines_renta">Tipo de brincolin</label>
        <select name="tipo_brincolines_renta">
          <option value="">Selecciona una opción</option>
        </select>
        <label for="tamaño_brincolines_renta">Tamaño del brincolin</label>
        <select name="tamaño_brincolines_renta">
          <option value="">Selecciona una opción</option>
        </select>
        <label for="motores_brincolines_renta">Motores</label>
        <select name="motores_brincolines_renta">
          <option value="">Selecciona una opción</option>
        </select>
        <label for="extenciones_brincolines_renta">Extenciones para el brincolin</label>
        <select name="extenciones_brincolines_renta">
          <option value="">Selecciona una opción</option>
        </select>
      </div>

      <div class="input-group">
        <button class="sign">Registrar Renta</button>
      </div>

    </form>

  </div>

  <script>
    // Mostrar/ocultar campos basados en los checkboxes
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        const relatedInputs = document.getElementById(`${this.id}_inputs`);
        if (relatedInputs) {
          relatedInputs.classList.toggle('hidden', !this.checked);
        }
      });
    });
  </script>
  <style>
    .hidden {
      display: none;
    }
  </style>

  @include('fooder')
  
</body>
</html>
