@extends('user.layouts.app')

@section('title', 'Daftar Organisasi')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Organisasi</h2>

    <!-- Search Form -->
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Cari organisasi..." onkeyup="filterOrganizations()">
    </div>

    <!-- List of Organizations -->
    <div class="row" id="organizationList">
        @forelse($organizations as $organization)
            <div class="col-md-4 mb-4 organization-item">
                <div class="card shadow-sm border-0">
                    @if($organization->banner_image)
                        <img src="{{ asset('storage/' . $organization->banner_image) }}" class="card-img-top" alt="{{ $organization->name }}" style="height: 180px; object-fit: cover; border-radius: 10px 10px 0 0;">
                    @else
                        <img src="{{ asset('placeholder.png') }}" class="card-img-top" alt="Placeholder" style="height: 180px; object-fit: cover; border-radius: 10px 10px 0 0;">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $organization->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($organization->description, 80) }}</p>
                        <a href="{{ route('organizations.show', $organization->id) }}" class="btn btn-outline-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">Tidak ada organisasi yang ditemukan.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const organizations = document.querySelectorAll(".organization-item");

        searchInput.addEventListener("keyup", function () {
            let input = searchInput.value.toLowerCase().trim();

            organizations.forEach(function (org) {
                let orgName = org.querySelector(".card-title").textContent.toLowerCase();
                if (orgName.includes(input)) {
                    org.classList.remove("d-none");
                } else {
                    org.classList.add("d-none");
                }
            });
        });
    });
</script>
@endsection
