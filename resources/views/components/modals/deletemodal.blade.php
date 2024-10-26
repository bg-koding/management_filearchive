<div class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-small">
        <form action="{{ $action ?? '' }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3>Yakin Ingin Menghapus Data ini?</h3>
                    <p>Data yang dihapus tidak dapat dikembalikan.</p>
                </div>
                <div class="flex items-center justify-center gap-2 p-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-danger">TETAP HAPUS</button>
                </div>
            </div>
        </form>
    </div>
</div>
