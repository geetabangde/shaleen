@extends('admin.layouts.app')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row ledger-add-form">
         <div class="col-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <div>
                     <h4>📒 Add Dynamic Modules</h4>
                  </div>
                  <a href="{{ route('admin.dynamicmodules.index') }}" class="btn btn-primary">
                     ⬅ Back
                  </a>
               </div>

               <form action="{{ route('admin.dynamicmodules.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">

                     {{-- Module Details --}}
                     <div class="row mb-4">
                        <h5 class="mb-3">🛍️ Module Details</h5>
                        <div class="col-md-3">
                           <label class="form-label">Module Name</label>
                           <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                              value="{{ old('name') }}">
                           @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-3">
                           <input type="checkbox" name="allow_edit" value="1" {{ old('allow_edit') ? 'checked' : '' }}>
                           <label class="form-label ms-2">Allow Edit</label>
                        </div>
                        <div class="col-md-3">
                           <input type="checkbox" name="allow_delete" value="1" {{ old('allow_delete') ? 'checked' : '' }}>
                           <label class="form-label ms-2">Allow Delete</label>
                        </div>
                        <div class="col-md-3">
                           <input type="checkbox" name="allow_show" value="1" {{ old('allow_show') ? 'checked' : '' }}>
                           <label class="form-label ms-2">Allow Show</label>
                        </div>
                     </div>

                     {{-- Fields Section --}}
                     <div class="row">
                        <h5 class="mb-3">🛍️ Fields</h5>
                        <div id="fieldsContainer">
                           <div class="field-group mb-3 border p-3 rounded">
                              <div class="row">

                                 {{-- Field Label --}}
                                 <div class="col-md-3 mb-3">
                                    <label class="form-label">Field Label</label>
                                    <input type="text" name="fields[0][label]" class="form-control">
                                 </div>

                                 {{-- Field Type --}}
                                 <div class="col-md-3 mb-3">
                                    <label class="form-label">Field Type</label>
                                    <select name="fields[0][type]" class="form-control field-type">
                                       <option value="text">Text</option>
                                       <option value="number">Number</option>
                                       <option value="email">Email</option>
                                       <option value="password">Password</option>
                                       <option value="date">Date</option>
                                       <option value="file">File</option>
                                       <option value="radio">Radio</option>
                                       <option value="checkbox">Checkbox</option>
                                       <option value="dropdown">Dropdown</option>
                                    </select>
                                 </div>

                                 {{-- Placeholder --}}
                                 <div class="col-md-3 mb-3 placeholder-container">
                                    <label class="form-label">Placeholder</label>
                                    <input type="text" name="fields[0][attributes][placeholder]" class="form-control">
                                 </div>

                                 {{-- Default Value --}}
                                 <div class="col-md-3 mb-3 default-container">
                                    <label class="form-label">Default Value</label>
                                    <input type="text" name="fields[0][attributes][default]" class="form-control">
                                 </div>

                                 {{-- Max Length --}}
                                 <div class="col-md-3 mb-3 maxlength-container">
                                    <label class="form-label">Max Length</label>
                                    <input type="number" name="fields[0][attributes][maxlength]" class="form-control" min="1">
                                 </div>

                                 {{-- Required --}}
                                 <div class="col-md-3 mb-3 d-flex align-items-center">
                                    <input type="checkbox" class="required-toggle" name="fields[0][attributes][required]" value="1">
                                    <label class="form-label ms-2">Required</label>
                                 </div>
                                 {{-- Show in Table --}}
                                 <div class="col-md-3 mb-3 d-flex align-items-center">
                                    <input type="checkbox" class="table-show-toggle" 
                                          name="fields[0][table_show]" value="1">
                                    <label class="form-label ms-2">Show in Table</label>
                                 </div>


                                 {{-- Options for Radio/Checkbox/Dropdown --}}
                                 <div class="col-md-12 mb-3 options-container" style="display: none;">
                                    <div class="options-type-container" style="display: none;">
                                       <label class="form-label">Options Type</label>
                                       <div class="mb-2">
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input options-type" type="radio" name="fields[0][options_type]" id="static-0" value="static" checked>
                                             <label class="form-check-label" for="static-0">Static</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input options-type" type="radio" name="fields[0][options_type]" id="dynamic-0" value="dynamic">
                                             <label class="form-check-label" for="dynamic-0">Dynamic</label>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="static-options">
                                       <label class="form-label">Static Options</label>
                                       <div class="options-list">
                                          <div class="input-group mb-2">
                                             <input type="text" name="fields[0][options][]" class="form-control">
                                             <button type="button" class="btn btn-outline-secondary add-option">Add Option</button>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="dynamic-options" style="display: none;">
                                       <label class="form-label">Dynamic Options (Select Module)</label>
                                       <select name="fields[0][dynamic_module_id]" class="form-control">
                                          <option value="">Select Module</option>
                                          @foreach(\App\Models\Module::all() as $module)
                                          <option value="{{ $module->id }}">{{ $module->name }}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>

                                 <div class="col-md-12">
                                    <button type="button" class="btn btn-danger remove-field mt-2">Remove Field</button>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12 mb-3">
                           <button type="button" class="btn btn-primary add-field">Add Another Field</button>
                        </div>
                     </div>

                     {{-- Submit --}}
                     <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save Module</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
let fieldIndex = 1;

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
   // Table-show toggle → mark label input with custom attr (for clarity)
   if(e.target.classList.contains('table-show-toggle')) {
      const fg = e.target.closest('.field-group');
      const labelInput = fg.querySelector('input[name*="[label]"]');
      if(e.target.checked) {
         labelInput.setAttribute('data-table-show', '1');
      } else {
         labelInput.removeAttribute('data-table-show');
      }
   }
});
</script>
@endsection