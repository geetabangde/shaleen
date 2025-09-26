@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row ledger-add-form">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>📒 Add {{ $module->name }}</h4>
                        </div>
                        <a href="{{ route('admin.modules.records.index', $module->id) }}" class="btn btn-primary">
                            ⬅ Back
                        </a>
                    </div>

                    <form action="{{ route('admin.modules.records.store', $module->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                @foreach($module->fields as $field)
                                    @php
                                        $fieldName   = "fields[{$field->id}]";
                                        $oldValue    = old("fields.{$field->id}");
                                        $fieldOptions = $field->options ?? [];
                                        $required    = $field->required ? 'required' : '';
                                        $placeholder = $field->placeholder ?? '';
                                        $default     = $field->default_value ?? '';
                                        $maxlength   = $field->max_length ?? '';
                                    @endphp
                                    
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">{{ $field->label }} 
                                            @if($field->required) <span class="text-danger">*</span> @endif
                                        </label>

                                        {{-- Text / Number / Date / Email / Password --}}
                                        @if(in_array($field->type,['text','number','date','email','password']))
                                            <input type="{{ $field->type }}" 
                                                name="{{ $fieldName }}" 
                                                class="form-control @error("fields.{$field->id}") is-invalid @enderror"
                                                value="{{ $oldValue ?? $default }}"
                                                placeholder="{{ $placeholder }}"
                                                {{ $required }}
                                                @if($maxlength) maxlength="{{ $maxlength }}" @endif>

                                        {{-- File --}}
                                        @elseif($field->type === 'file')
                                            <input type="file" 
                                                name="{{ $fieldName }}" 
                                                class="form-control @error("fields.{$field->id}") is-invalid @enderror"
                                                {{ $required }}>

                                        {{-- Radio --}}
                                        @elseif($field->type === 'radio')
                                            @foreach($fieldOptions as $option)
                                                <div class="form-check">
                                                    <input class="form-check-input" 
                                                        type="radio" 
                                                        name="{{ $fieldName }}" 
                                                        value="{{ $option }}"
                                                        {{ ($oldValue ?? $default) == $option ? 'checked' : '' }}
                                                        {{ $required }}>
                                                    <label class="form-check-label">{{ $option }}</label>
                                                </div>
                                            @endforeach
                                        
                                        {{-- Checkbox --}}
                                        @elseif($field->type === 'checkbox')
                                            @foreach($fieldOptions as $option)
                                                <div class="form-check">
                                                    <input class="form-check-input" 
                                                        type="checkbox" 
                                                        name="{{ $fieldName }}[]" 
                                                        value="{{ $option }}"
                                                        {{ is_array($oldValue) && in_array($option,$oldValue) ? 'checked' : '' }}
                                                        {{ $required }}>
                                                    <label class="form-check-label">{{ $option }}</label>
                                                </div>
                                            @endforeach
                                        
                                        {{-- Dropdown --}}

                                                            
                                         @elseif($field->type === 'dropdown')
                                                <select name="{{ $fieldName }}" 
                                                    class="form-control @error("fields.{$field->id}") is-invalid @enderror"
                                                    {{ $required }}>
                                                    <option value="">Select {{ $field->label }}</option>

                                                    {{-- STATIC VALUES --}}
                                                    @if($field->value_type == 'static')
                                                        @php
                                                            $fieldOptions = is_array($field->options) ? $field->options : json_decode($field->options, true);
                                                        @endphp
                                                        @foreach($fieldOptions as $option)
                                                            <option value="{{ $option }}" {{ ($oldValue ?? $default) == $option ? 'selected' : '' }}>
                                                                {{ ucfirst($option) }}
                                                            </option>
                                                        @endforeach

                                                    {{-- DYNAMIC VALUES --}}
                                                    @elseif($field->value_type == 'dynamic')
                                                        @php
                                                            $optionsData = is_array($field->options) ? $field->options : json_decode($field->options, true);
                                                            $moduleId = (int) $optionsData[0]; 
                                                            
                                                           
                                                            
                                                            $module = \App\Models\Module::find($moduleId);
                                                            // @dd(print_r( $module));
                                                            $tableName = strtolower($module->name) . 's'; 

                                                           
                                                            $moduleFields = \App\Models\ModuleField::where('module_id', $moduleId)->pluck('label')->toArray();
                                                            

                                                          
                                                            $records = \DB::table($tableName)->get(); 
                                                        @endphp

                                                        @foreach($records as $record)
                                                           
                                                             @php
                                                            $displayText = implode(' | ', array_map(function($label) use ($record) {
                                                                $columnName = strtolower(str_replace(' ', '_', $label));
                                                                return $record->$columnName ?? '';
                                                            }, $moduleFields));
                                                        @endphp
                                                            <option value="{{ $record->id }}" {{ ($oldValue ?? $default) == $record->id ? 'selected' : '' }}>
                                                                {{ $displayText }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            @endif

                                        {{-- Dropdown --}}



                                        @error("fields.{$field->id}") 
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                @endforeach
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save {{ $module->name }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection