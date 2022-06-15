<x-app-layout>
    {{-- @if(Auth::user()->where('role', '=', 'Admin')) --}}
    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Sub Item</h6>
            </div>
            <div class="col-6 text-end">
                <a class="btn bg-gradient-dark mb-0" href="" data-bs-toggle="modal" data-bs-target="#tambahPerangkat"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Sub Item</a>
              </div>
          </div>
        </div>
        <div class="card">
          <div class="table-responsive">
            <table id="datatable-search" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th> --}}
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                  {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item</th> --}}
                  {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th> --}}
                  {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th> --}}
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sub_item as $i)
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  {{-- <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" >{{ $item->kode_perangkat }}</span>
                  </td> --}}
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" maxlength="10" >{{ $i->name }}</span>
                  </td>
                  {{-- <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" maxlength="10" >{{ $i->item->name }}</span>
                  </td> --}}
                  {{-- <td class="align-middle text-center">
                    <img src="{{ asset( $item->gambar) }}" style="max-width: 70px" class="img-fluid shadow border-radius-xl">
                  </td> --}}
                  {{-- <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->stok }}</span>
                  </td> --}}
                  {{-- <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">Rp. @money($item->harga)</span>
                  </td> --}}
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" style="display:block;text-overflow: ellipsis;width: 200px;overflow: hidden; white-space: nowrap;">{!! $i->description !!}</span>
                  </td>
                  <td>
                    <div class="align-middle text-center">
                      <form id="form-delete" action="{{route('item.destroy', $i->id)}}" method="POST" style="display: inline">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="fas fa-trash text-secondary"></i></button>
                      </form>
                      <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editPerangkat-{{$i->id}}" title="Edit"><i class="fas fa-user-edit text-secondary"></i></a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Tambah Perangkat -->
    <div class="modal fade" id="tambahPerangkat" tabindex="-1" role="dialog" aria-labelledby="tambahPerangkatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('sub-item.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPerangkatLabel">Add Sub Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Sub Item Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="*Item name" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">Main item:</label>
                            <select class="form-control" name="item_id" id="exampleFormControlSelect1" required>
                              @foreach ($item as $i)
                              <option value="">--Select--</option>
                              <option value="{{$i->id}}">{{$i->name}}</option>
                              @endforeach
                            </select>
                          </div> --}}
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Sub Item Description:</label>
                            <textarea class="form-control" name="description" id="mytextarea" placeholder="*Item description" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal Edit Perangkat -->
    @foreach($sub_item as $i)
    <div class="modal fade" id="editPerangkat-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="editPerangkatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ url('item-update', $i->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPerangkatLabel">Edit Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Kode Perangkat:</label>
                          <input type="number" class="form-control" name="kode_perangkat" value="{{$i->kode_perangkat}}" placeholder="4 Digit">
                        </div> --}}
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" name="name" value="{{$i->name}}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">Main item:</label>
                            <select class="form-control" name="item_id" id="exampleFormControlSelect1" required>
                              @foreach ($item as $i)
                              <option value="{{$i->id}}" selected>{{$i->nama}}</option>
                              @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="message-text" class="col-form-label">Gambar Detail:</label>
                            <input type="file" class="form-control" name="gambar_detail[]" value="{{asset($i->gambar_detail)}}" multiple required>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="message-text" class="col-form-label">Stok:</label>
                            <input type="number" class="form-control" name="stok" value="{{$i->stok}}">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="message-text" class="col-form-label">Harga:</label>
                            <input type="number" class="form-control" name="harga" value="{{$i->harga}}">
                        </div> --}}
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea class="form-control" name="description" id="mytextarea" value="{{$i->description}}">{{$i->description}}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    {{-- @endif --}}

    {{-- @if(Auth::user()->where('role', '=', 'user'))

    @endif --}}
    @push('scripts')
    <script>
      const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true
      });


      $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                title: `Delete Sub Item?`,
                  text: "If the data is deleted, the data will be lost forever!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  form.submit();
                }
              });
          });


    </script>
    @endpush
  </x-app-layout>
