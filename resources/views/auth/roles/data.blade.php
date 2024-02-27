@if ($type == 'store')
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <fieldset>
                <legend>
                    بخش ها
                </legend>
                <div class="form-group">
                    <div class="col-md-12">
                        <ul>
                            @php
                                $total_records = count($permission);
                            @endphp
                            @for ($i = 0; $i < $total_records / 2; $i++)
                                <li style="overflow-wrap: anywhere;">
                                    <input type="checkbox" value="{{ $permission[$i]->id }}" name="permissions[]"
                                        id="add_role{{ $permission[$i]->id }}">
                                    <label for="add_role{{ $permission[$i]->id }}">{{ $permission[$i]->name }}</label>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-xs-12 col-md-6">
            <fieldset>
                <legend>
                    بخش ها
                </legend>
                <div class="form-group">
                    <div class="col-md-12">
                        <ul>
                            @for ($i = $i; $i < $total_records; $i++)
                                <li style="overflow-wrap: anywhere;">
                                    <input type="checkbox" value="{{ $permission[$i]->id }}" name="permissions[]"
                                        id="add_role{{ $permission[$i]->id }}">
                                    <label for="add_role{{ $permission[$i]->id }}">{{ $permission[$i]->name }}</label>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
@endif
@if ($type == 'edit')
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <fieldset>
                <legend>
                    بخش ها
                </legend>
                <div class="form-group">
                    <div class="col-md-12">
                        <ul>
                            @php
                                $total_records = count($permission);
                            @endphp
                            @for ($i = 0; $i < $total_records / 2; $i++)
                                <li style="overflow-wrap: anywhere;">
                                    <input type="checkbox" value="{{ $permission[$i]->id }}" name="permissions[]"
                                        {{ $role->hasPermissionTo($permission[$i]->name) == true ? 'checked' : '' }}
                                        id="add_role{{ $permission[$i]->id }}">
                                        <label for="add_role{{ $permission[$i]->id }}">{{ $permission[$i]->name_dr }}</label>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-xs-12 col-md-6">
            <fieldset>
                <legend>
                    بخش ها
                </legend>
                <div class="form-group">
                    <div class="col-md-12">
                        <ul>
                            @for ($i = $i; $i < $total_records; $i++)
                                <li style="overflow-wrap: anywhere;">
                                    <input type="checkbox" value="{{ $permission[$i]->id }}" name="permissions[]"
                                        {{ $role->hasPermissionTo($permission[$i]->name) == true ? 'checked' : '' }}
                                        id="add_role{{ $permission[$i]->id }}">
                                    <label
                                        for="add_role{{ $permission[$i]->id }}">{{ $permission[$i]->name_dr }}</label>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
@endif
@if ($type == 'role_details')
    <label for="roles">صلاحیت ها</label>
    <select class="form-control" multiple name="roles[]" id="roles" required>
        {{-- <option value="" style="direction: ltr !important;">--Select Roles--</option> --}}
        @foreach ($roles as $item)
            <option value="{{ $item->name }}" style="direction: ltr !important;">{{ $item->name }}</option>
        @endforeach
    </select>

@endif
@if ($type == 'edit_role_details')
    <div class="col-6">
        <label for="roles">Roles</label>
        <select class="form-control select2" multiple name="roles[]" id="roles_edit" required>
            <option value="" style="direction: ltr !important;">--Select Roles--</option>
            @foreach ($roles as $item)
                <option value="{{ $item->name }}" style="direction: ltr !important;"
                    {{ \App\Models\User::find($user_id)->hasRole($item->name) ? 'selected' : '' }}>{{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
@endif
