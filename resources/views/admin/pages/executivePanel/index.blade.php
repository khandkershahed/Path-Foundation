<x-admin-app-layout :title="'Executive Panel'">
    <div class="card card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5 bg-info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 text-lg-center text-sm-center">
                        <div class="card-title table_title">
                            <h2 class="text-center text-white">Executive Panel</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 text-lg-end text-sm-center">
                        <button type="button" class="btn btn-sm btn-light-success rounded-0"
                            data-kt-menu-placement="bottom-end" data-bs-toggle="modal"
                            data-bs-target="#executiveAddModal">
                            Add New
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover align-middle rounded-0 table-row-bordered border fs-6 g-5"
                id="kt_datatable_example_1">
                <thead class="table_header_bg">
                    <tr class="text-center text-gray-900 fw-bolder fs-7 text-uppercase">
                        <th class="" width="5%">Sl</th>
                        <th class="" width="15%">Image</th>
                        <th class="" width="30%">Name</th>
                        <th class="" width="20%">Email</th>
                        <th class="" width="20%">Designation</th>
                        <th class="text-center" width="10%">Action</th>
                </thead>
                <tbody class="fw-bold text-gray-600 text-center">
                    @if ($teams)
                        @foreach ($teams as $team)
                            <tr class="odd">
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <img src="{{ asset('storage/'.$team->photo) }}" alt="" class="w-75px">
                                </td>
                                <td>
                                    {{ $team->name }}
                                </td>
                                <td>
                                    {{ $team->email }}
                                </td>
                                <td>
                                    {{ $team->designation }}
                                </td>
                                <td class="text-center">

                                    <a href="#"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                        data-bs-toggle="modal" data-bs-target="#executiveEditModal_{{ $team->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="{{ route('admin.executive-panel.destroy', $team->id) }}"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 delete"
                                        data-kt-docs-table-filter="delete_row">
                                        <i class="fa-solid fa-trash-can-arrow-up"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{-- Add Modal --}}
    {{-- Add Modal --}}
    <div class="modal fade" id="executiveAddModal" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-0 border-0 shadow-sm">
                <div class="modal-header p-2 rounded-0">
                    <h5 class="modal-title ps-5">Add Executive Panel</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                </div>
                <form action="{{ route('admin.executive-panel.store') }}" class="needs-validation" method="post"
                    novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="container px-0">
                            <div class="row">
                                <div class="col-md-6 mb-7">
                                    <label for="name" class="col-form-label fw-bold fs-6 ">Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm"
                                        id="name">
                                    <div class="invalid-feedback"> Please enter the name. </div>
                                </div>

                                <div class="col-md-6 mb-7">
                                    <label for="email" class="col-form-label fw-bold fs-6 ">Email</label>
                                    <input type="email" name="email" class="form-control form-control-sm"
                                        id="email">
                                    <div class="invalid-feedback"> Please enter a valid email. </div>
                                </div>

                                <div class="col-md-6 mb-7">
                                    <label for="member_id" class="col-form-label fw-bold fs-6 ">Member ID</label>
                                    <input type="text" name="member_id" class="form-control form-control-sm"
                                        id="member_id">
                                    <div class="invalid-feedback"> Please enter the member ID. </div>
                                </div>

                                <div class="col-md-6 mb-7">
                                    <label for="phone" class="col-form-label fw-bold fs-6 ">Phone</label>
                                    <input type="text" name="phone" class="form-control form-control-sm"
                                        id="phone">
                                </div>

                                <div class="col-md-6 mb-7">
                                    <x-metronic.label for="photo"
                                        class="col-form-label fw-bold fs-6 ">{{ __('Photo') }}
                                    </x-metronic.label>

                                    <x-metronic.input id="photo" type="file" name="photo"></x-metronic.input>
                                </div>

                                <div class="col-md-6 mb-7">
                                    <label for="designation" class="col-form-label fw-bold fs-6 ">Designation</label>
                                    <input type="text" name="designation" class="form-control form-control-sm"
                                        id="designation">
                                </div>

                                <div class="col-md-6 mb-7">
                                    <label for="institution" class="col-form-label fw-bold fs-6 ">Institution</label>
                                    <input type="text" name="institution" class="form-control form-control-sm"
                                        id="institution">
                                </div>

                                <div class="col-md-6 mb-7">
                                    <label for="blood_group" class="col-form-label fw-bold fs-6 ">Blood Group</label>
                                    <input type="text" name="blood_group" class="form-control form-control-sm"
                                        id="blood_group">
                                </div>

                                <div class="col-md-6 mb-7">
                                    <label for="nid_number" class="col-form-label fw-bold fs-6 ">NID Number</label>
                                    <input type="text" name="nid_number" class="form-control form-control-sm"
                                        id="nid_number">
                                </div>

                                <div class="col-md-6 mb-7">
                                    <label for="district" class="col-form-label fw-bold fs-6 ">District</label>
                                    <input type="text" name="district" class="form-control form-control-sm"
                                        id="district">
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label for="address" class="col-form-label fw-bold fs-6 ">Address</label>
                                    <textarea name="address" class="form-control form-control-sm" id="address"></textarea>
                                </div>

                                <div class="col-md-6 mb-7">
                                    <label for="status" class="col-form-label fw-bold fs-6 ">Status</label>
                                    <select class="form-select form-select-solid" name="status" id="status">
                                        <option></option>
                                        <option value="active">Active</option>
                                        <option value="inactive">In Active</option>
                                    </select>
                                    <div class="invalid-feedback"> Please select the status. </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-2">
                        <button type="submit" class="btn btn-sm btn-light-primary rounded-0">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    @foreach ($teams as $team)
        <div class="modal fade" id="executiveEditModal_{{ $team->id }}" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content rounded-0 border-0 shadow-sm">
                    <div class="modal-header p-2 rounded-0">
                        <h5 class="modal-title ps-5">Edit Executive Panel</h5>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                    </div>
                    <form action="{{ route('admin.executive-panel.update', $team->id) }}" class="needs-validation"
                        method="post" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="container px-0">
                                <div class="row">
                                    <div class="col-md-6 mb-7">
                                        <label for="name" class="col-form-label fw-bold fs-6 ">Name</label>
                                        <input type="text" name="name" class="form-control form-control-sm"
                                            id="name" value="{{ $team->name }}">
                                        <div class="invalid-feedback"> Please enter the name. </div>
                                    </div>

                                    <div class="col-md-6 mb-7">
                                        <label for="email" class="col-form-label fw-bold fs-6 ">Email</label>
                                        <input type="email" name="email" class="form-control form-control-sm"
                                            id="email" value="{{ $team->email }}">
                                        <div class="invalid-feedback"> Please enter a valid email. </div>
                                    </div>

                                    <div class="col-md-6 mb-7">
                                        <label for="member_id" class="col-form-label fw-bold fs-6 ">Member ID</label>
                                        <input type="text" name="member_id" class="form-control form-control-sm"
                                            id="member_id" value="{{ $team->member_id }}">
                                        <div class="invalid-feedback"> Please enter the member ID. </div>
                                    </div>

                                    <div class="col-md-6 mb-7">
                                        <label for="phone" class="col-form-label fw-bold fs-6 ">Phone</label>
                                        <input type="text" name="phone" class="form-control form-control-sm"
                                            id="phone" value="{{ $team->phone }}">
                                    </div>

                                    <div class="col-md-6 mb-7">
                                        <x-metronic.label for="photo" class="col-form-label fw-bold fs-6 ">{{ __('photo') }}
                                        </x-metronic.label>
                                        <x-metronic.file-input id="photo" type="file" name="photo" :source="asset('storage/'.$team->photo)"
                                        :value="old('photo', $team->photo)"></x-metronic.file-input>
                                    </div>

                                    <div class="col-md-6 mb-7">
                                        <label for="designation" class="col-form-label fw-bold fs-6 ">Designation</label>
                                        <input type="text" name="designation" class="form-control form-control-sm"
                                            id="designation" value="{{ $team->designation }}">
                                    </div>

                                    <div class="col-md-6 mb-7">
                                        <label for="institution" class="col-form-label fw-bold fs-6 ">Institution</label>
                                        <input type="text" name="institution" class="form-control form-control-sm"
                                            id="institution" value="{{ $team->institution }}">
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label for="blood_group" class="col-form-label fw-bold fs-6 ">Blood Group</label>
                                        <input type="text" name="blood_group" class="form-control form-control-sm"
                                            id="blood_group" value="{{ $team->blood_group }}">
                                    </div>

                                    <div class="col-md-6 mb-7">
                                        <label for="nid_number" class="col-form-label fw-bold fs-6 ">NID Number</label>
                                        <input type="text" name="nid_number" class="form-control form-control-sm"
                                            id="nid_number" value="{{ $team->nid_number }}">
                                    </div>

                                    <div class="col-md-6 mb-7">
                                        <label for="district" class="col-form-label fw-bold fs-6 ">District</label>
                                        <input type="text" name="district" class="form-control form-control-sm"
                                            id="district" value="{{ $team->district }}">
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <label for="address" class="col-form-label fw-bold fs-6 ">Address</label>
                                        <textarea name="address" class="form-control form-control-sm" id="address">{{ $team->address }}</textarea>
                                    </div>

                                    <div class="col-md-6 mb-7">
                                        <label for="status" class="col-form-label fw-bold fs-6 ">Status</label>
                                        <select class="form-select form-select-solid" name="status" id="status">
                                            <option></option>
                                            <option @selected($team->status == 'active') value="active">Active</option>
                                            <option @selected($team->status == 'inactive') value="inactive">In Active</option>
                                        </select>
                                        <div class="invalid-feedback"> Please select the status. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer p-2">
                            <button type="submit" class="btn btn-sm btn-light-primary rounded-0">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</x-admin-app-layout>
