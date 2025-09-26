@extends('admin.layouts.app')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row ledger-add-form">
         <div class="col-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <div>
                     <h4>✏️ Edit Dynamic Module</h4>
                  </div>
                  <a href="{{ route('admin.dynamicmodules.index') }}" class="btn btn-primary">
                     ⬅ Back
                  </a>
               </div>


               <form action="{{ route('admin.dynamicmodules.update', $module->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                 
                  <div class="card-body">
                     <div class="row mb-4">
                        <h5 class="mb-3">🛍️ Module Details</h5>
                        <div class="col-md-3">
                           <label class="form-label">Module Name</label>
                           <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                              value="{{ old('name', $module->name) }}">
                           @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-3">
                           <input type="checkbox" name="allow_edit" value="1" {{ old('allow_edit', $module->allow_edit) ? 'checked' : '' }}>
                           <label class="form-label ms-2">Allow Edit</label>
                        </div>
                        <div class="col-md-3">
                           <input type="checkbox" name="allow_delete" value="1" {{ old('allow_delete', $module->allow_delete) ? 'checked' : '' }}>
                           <label class="form-label ms-2">Allow Delete</label>
                        </div>
                        <div class="col-md-3">
                           <input type="checkbox" name="allow_show" value="1" {{ old('allow_show', $module->allow_show) ? 'checked' : '' }}>
                           <label class="form-label ms-2">Allow Show</label>
                        </div>
                     </div>

                     {{-- Fields Section --}}
                     <div class="row">
                        <h5 class="mb-3">🛍️ Fields</h5>
                        <div id="fieldsContainer">
                           @php
                              $oldFields = old('fields', $module->fields);

                           @endphp
                         
                            
                          
                           @foreach($oldFields as $i => $field)
                        
                           <div class="field-group mb-3 border p-3 rounded">
                              <div class="row">
                                 {{-- Label --}}
                                 <div class="col-md-3 mb-3">
                                    <label class="form-label">Field Label</label>
                                    <input type="text" name="fields[{{ $i }}][label]" class="form-control"
                                       value="{{ $field['label'] ?? '' }}" {{ isset($field['attributes']['required']) && $field['attributes']['required'] ? 'required' : '' }}>
                                    <input type="hidden" name="fields[{{ $i }}][old_label]" value="{{ $field['label'] ?? '' }}">
                                 </div>
                                 

                                 {{-- Type --}}
                                 <div class="col-md-3 mb-3">
                                    <label class="form-label">Field Type</label>
                                    <select name="fields[{{ $i }}][type]" class="form-control field-type">
                                       @php
                                          $types = ['text','number','email','password','date','file','radio','checkbox','dropdown'];
                                       @endphp
                                       @foreach($types as $type)
                                          <option value="{{ $type }}" {{ ($field['type'] ?? '') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                                

                                 {{-- Placeholder --}}

                                 <div class="col-md-3 mb-3 placeholder-container"
                                       @if(in_array(($field['type'] ?? $field->type ?? ''), ['radio','checkbox','dropdown'])) style="display:none;" @endif>
                                       <label class="form-label">Placeholder</label>
                                       <input type="text" name="fields[{{ $i }}][attributes][placeholder]" class="form-control"
                                             value="{{ $field['attributes']['placeholder'] ?? $field->placeholder ?? '' }}">
                                    </div>

                                 {{-- Default --}}

                                 <div class="col-md-3 mb-3 default-container" @if(in_array($field['type'] ?? '', ['radio','checkbox','dropdown'])) style="display:none;" @endif>
                                    <label class="form-label">Default Value</label>
                                    <input type="text" name="fields[{{ $i }}][attributes][default]" class="form-control"
                                       value="{{ $field['attributes']['default'] ?? $field->default_value ?? '' }}">
                                 </div>
                                 

                                 {{-- Max Length --}}
                                 <div class="col-md-3 mb-3 maxlength-container" @if(in_array($field['type'] ?? '', ['radio','checkbox','dropdown'])) style="display:none;" @endif>
                                    <label class="form-label">Max Length</label>
                                    <input type="number" name="fields[{{ $i }}][attributes][maxlength]" class="form-control"
                                      value="{{ $field['attributes']['maxlength'] ?? $field->max_length ?? '' }}" min="1">
                                 </div>

                                 {{-- Required --}}
                                 <div class="col-md-3 mb-3 d-flex align-items-center">
                                    <input type="checkbox" class="required-toggle"
                                          name="fields[{{ $i }}][attributes][required]" value="1"
                                          {{ ($field['attributes']['required'] ?? $field->required ?? false) ? 'checked' : '' }}>
                                    <label class="form-label ms-2">Required</label>
                                 </div>
                                 {{-- Show in Table --}}
                                 <div class="col-md-3 mb-3 d-flex align-items-center">
                                    <input type="checkbox" class="table-show-toggle"
                                       name="fields[{{ $i }}][table_show]" value="1"
                                       {{ ($field['table_show'] ?? false) ? 'checked' : '' }}>
                                    <label class="form-label ms-2">Show in Table</label>
                                 </div>

                                 {{-- Options --}}
                                 <div class="col-md-12 mb-3 options-container" @if(in_array($field['type'] ?? '', ['radio','checkbox','dropdown'])) style="display:block;" @else style="display:none;" @endif>
                                    <div class="options-type-container" @if(($field['type'] ?? '') === 'dropdown') style="display:block;" @else style="display:none;" @endif>
                                       <label class="form-label">Options Type</label>
                                       <div class="mb-2">
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input options-type" type="radio" name="fields[{{ $i }}][options_type]" id="static-{{ $i }}" value="static"
                                                {{ (isset($field['value_type']) && $field['value_type'] === 'static') || !isset($field['options_type']) ? 'checked' : '' }}>
                                             <label class="form-check-label" for="static-{{ $i }}">Static</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input options-type" type="radio" name="fields[{{ $i }}][options_type]" id="dynamic-{{ $i }}" value="dynamic"
                                                {{ isset($field['value_type']) && $field['value_type'] === 'dynamic' ? 'checked' : '' }}>
                                             <label class="form-check-label" for="dynamic-{{ $i }}">Dynamic</label>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="static-options" @if(isset($field['value_type']) && $field['value_type'] === 'dynamic') style="display:none;" @else style="display:block;" @endif>
                                       <label class="form-label">Static Options</label>
                                       <div class="options-list">
                                          @if(isset($field['options']) && count($field['options']))
                                             @foreach($field['options'] as $oi => $option)
                                             <div class="input-group mb-2">
                                                <input type="text" name="fields[{{ $i }}][options][]" class="form-control" value="{{ old("fields.$i.options.$oi", $option) }}">
                                                <button type="button" class="btn btn-outline-danger remove-option">Remove</button>
                                             </div>
                                             @endforeach
                                          @else
                                             <div class="input-group mb-2">
                                                <input type="text" name="fields[{{ $i }}][options][]" class="form-control">
                                                <button type="button" class="btn btn-outline-secondary add-option">Add Option</button>
                                             </div>
                                          @endif
                                       </div>
                                    </div>
                          <div class="dynamic-options" @if(isset($field['value_type']) && $field['value_type'] === 'dynamic') style="display:block;" @else style="display:none;" @endif>
                                       <label class="form-label">Dynamic Options (Select Module)</label>
                                       <select name="fields[{{ $i }}][dynamic_module_id]" class="form-control">
                                          <option value="">Select Module</option>
                                         
                                          @foreach($modules as $m)

                                             <option value="{{ $m->id }}"
                                                @if((isset($field['dynamic_module_id']) && $field['dynamic_module_id'] == $m->id) || old("fields.$i.dynamic_module_id") == $m->id) selected @endif>
                                                {{ $m->name }}
                                             </option>
                                             <option value="{{ $m->id }}" 
                                                @if((isset($field['dynamic_module_id']) && $field['dynamic_module_id'] == $m->id) 
                                                   || old("fields.$i.dynamic_module_id") == $m->id) selected @endif>
                                                {{ $m->name }}
                                             </option>
                                          @endforeach
                                       </select>
                                    </div>
                                   

                                 </div>

                                 <div class="col-md-12">
                                    <button type="button" class="btn btn-danger remove-field mt-2">Remove Field</button>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>

                        <div class="col-md-12 mb-3">
                           <button type="button" class="btn btn-primary add-field">Add Another Field</button>
                        </div>
                     </div>

                     <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update Module</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
let fieldIndex = {{ count($oldFields) }};

function updateFieldNames(container, index) {
   container.querySelectorAll('input, select').forEach(input => {
      if(input.name) {
         input.name = input.name.replace(/fields\[\d+\]/, `fields[${index}]`);
      }
   });
   // Update radio IDs for options type
   const staticRadio = container.querySelector('input[value="static"]');
   const dynamicRadio = container.querySelector('input[value="dynamic"]');
   if (staticRadio) staticRadio.id = `static-${index}`;
   if (dynamicRadio) dynamicRadio.id = `dynamic-${index}`;
   const staticLabel = container.querySelector('label[for^="static-"]');
   const dynamicLabel = container.querySelector('label[for^="dynamic-"]');
   if (staticLabel) staticLabel.setAttribute('for', `static-${index}`);
   if (dynamicLabel) dynamicLabel.setAttribute('for', `dynamic-${index}`);
}

document.addEventListener('click', function(e) {
   // Add field
   if(e.target.classList.contains('add-field')) {
      const fieldsContainer = document.getElementById('fieldsContainer');
      const newField = document.querySelector('.field-group').cloneNode(true);

      // Reset inputs
      newField.querySelectorAll('input').forEach(input => {
         if(input.type !== 'checkbox' && input.type !== 'radio') input.value = '';
         if(input.type === 'checkbox') input.checked = false;
         if(input.type === 'radio') input.checked = (input.value === 'static');
      });
      newField.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

      // Reset options list to one empty input
      const optionsList = newField.querySelector('.options-list');
      optionsList.innerHTML = `
         <div class="input-group mb-2">
            <input type="text" name="fields[${fieldIndex}][options][]" class="form-control">
            <button type="button" class="btn btn-outline-secondary add-option">Add Option</button>
         </div>
      `;

      // Reset visibility
      newField.querySelector('.options-container').style.display = 'none';
      newField.querySelector('.options-type-container').style.display = 'none';
      newField.querySelector('.static-options').style.display = 'block';
      newField.querySelector('.dynamic-options').style.display = 'none';
      newField.querySelector('.placeholder-container').style.display = 'block';
      newField.querySelector('.default-container').style.display = 'block';
      newField.querySelector('.maxlength-container').style.display = 'block';

      fieldsContainer.appendChild(newField);
      updateFieldNames(newField, fieldIndex);
      fieldIndex++;
   }

   // Remove field
   if(e.target.classList.contains('remove-field')) {
      const fields = document.querySelectorAll('.field-group');
      if(fields.length > 1) e.target.closest('.field-group').remove();
      else alert("At least one field is required.");
   }

   // Add option
   if(e.target.classList.contains('add-option')) {
      const optionsList = e.target.closest('.options-list');
      const fieldGroup = e.target.closest('.field-group');
      const newOption = document.createElement('div');
      newOption.className = 'input-group mb-2';
      newOption.innerHTML = `
         <input type="text" class="form-control" name="${fieldGroup.querySelector('input[name*="[options][]"]').name}">
         <button type="button" class="btn btn-outline-danger remove-option">Remove</button>
      `;
      optionsList.appendChild(newOption);
   }

   // Remove option
   if(e.target.classList.contains('remove-option')) {
      const optionsList = e.target.closest('.options-list');
      const options = optionsList.querySelectorAll('.input-group');
      if(options.length > 1) e.target.parentElement.remove();
      else alert("At least one option is required for static options.");
   }
});

// Show/hide options, placeholder, default, maxlength
document.addEventListener('change', function(e) {
   if(e.target.classList.contains('field-type')) {
      const fg = e.target.closest('.field-group');
      const optionsContainer = fg.querySelector('.options-container');
      const optionsTypeContainer = fg.querySelector('.options-type-container');
      const staticOptions = fg.querySelector('.static-options');
      const dynamicOptions = fg.querySelector('.dynamic-options');
      const placeholderContainer = fg.querySelector('.placeholder-container');
      const defaultContainer = fg.querySelector('.default-container');
      const maxlengthContainer = fg.querySelector('.maxlength-container');

      if(['radio', 'checkbox'].includes(e.target.value)) {
         optionsContainer.style.display = 'block';
         optionsTypeContainer.style.display = 'none';
         staticOptions.style.display = 'block';
         dynamicOptions.style.display = 'none';
         placeholderContainer.style.display = 'none';
         defaultContainer.style.display = 'none';
         maxlengthContainer.style.display = 'none';
      } else if(e.target.value === 'dropdown') {
         optionsContainer.style.display = 'block';
         optionsTypeContainer.style.display = 'block';
         staticOptions.style.display = 'block'; // Default to static
         dynamicOptions.style.display = 'none';
         placeholderContainer.style.display = 'none';
         defaultContainer.style.display = 'none';
         maxlengthContainer.style.display = 'none';
      } else {
         optionsContainer.style.display = 'none';
         optionsTypeContainer.style.display = 'none';
         staticOptions.style.display = 'block';
         dynamicOptions.style.display = 'none';
         placeholderContainer.style.display = 'block';
         defaultContainer.style.display = 'block';
         maxlengthContainer.style.display = 'block';
      }
   }

   // Options type toggle (only for dropdown)
   if(e.target.classList.contains('options-type')) {
      const fg = e.target.closest('.field-group');
      const staticOptions = fg.querySelector('.static-options');
      const dynamicOptions = fg.querySelector('.dynamic-options');

      if(e.target.value === 'static') {
         staticOptions.style.display = 'block';
         dynamicOptions.style.display = 'none';
      } else {
         staticOptions.style.display = 'none';
         dynamicOptions.style.display = 'block';
      }
   }

   // Required toggle → mark label input as required
   if(e.target.classList.contains('required-toggle')) {
      const fg = e.target.closest('.field-group');
      const labelInput = fg.querySelector('input[name*="[label]"]');
      if(e.target.checked) {
         labelInput.setAttribute('required', 'required');
      } else {
         labelInput.removeAttribute('required');
      }
   }
   // Table-show toggle → just mark field with custom attr (optional, visual only)
   if(e.target.classList.contains('table-show-toggle')) {
      const fg = e.target.closest('.field-group');
      if(e.target.checked) {
         fg.setAttribute('data-table-show', '1');
      } else {
         fg.removeAttribute('data-table-show');
      }
   }
});
</script>
@endsection