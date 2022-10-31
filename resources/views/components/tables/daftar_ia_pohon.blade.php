@push('style')
    <style>
        #DataTables_Table_0_wrapper {
            padding: 0 !important
        }

        #DataTables_Table_0 {
            width: 100% !important
        }
    </style>
@endpush

<div class="row mt-3">
    <div class="col-12">
        <div class="table-responsive">
            {{ $filterStatus }}
            <table class="table table-bordered table-striped yajra-datatable p-0">
                <thead>
                    <tr class="text-center  ">
                        <th>{{ $thead_nomor }}</th>
                        <th>{{ $thead_nomor_mou_moa_ia }}</th>
                        <th>{{ $thead_pengusul }}</th>
                        <th style="width: 30%">Program</th>
                        <th>{{ $thead_dibuat_oleh }}</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@push('script')
    <script src="{{ asset('assets/dashboard') }}/js/plugin/moment/moment.min.js"></script>
    <script>
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ $link }}",
                data: function(d) {
                    d.status = $('#status').val();
                    d.dibuat_oleh = $('#dibuat-oleh').val();
                    d.search = $('input[type="search"]').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: '{{ $tbody_nomor_mou_moa_ia }}',
                    name: '{{ $tbody_nomor_mou_moa_ia }}'
                },
                {
                    data: 'pengusul_nama',
                    name: 'pengusul_nama',

                },
                {
                    data: 'program',
                    name: 'program'
                },
                {
                    data: 'dibuat_oleh',
                    name: 'dibuat_oleh',
                    className: 'text-center'
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center'
                },
            ],
        });

        $('#status').change(function() {
            table.draw();
        })

        $('#dibuat-oleh').change(function() {
            table.draw();
        })
    </script>
@endpush
