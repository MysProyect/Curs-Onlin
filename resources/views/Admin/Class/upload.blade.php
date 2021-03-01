<div>
	
  <div class="form-group">
              <label class="text-viol">Subir imagen Imagen</label>
              <input type="file" wire:model="file"  accept="image/*">
                @error('file') <span class="text-danger error">Seleccione una imagen</span> @enderror
          </div>

</div>