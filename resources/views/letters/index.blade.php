<td>
    {{-- Generate otomatis --}}
    <form action="{{ route('manager.letters.generate', $submission) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-sm btn-primary">
            <i class="fas fa-magic"></i> Generate
        </button>
    </form>

    {{-- Preview di browser --}}
    <a href="{{ route('manager.letters.preview', $submission) }}"
       target="_blank" class="btn btn-sm btn-info">
        <i class="fas fa-eye"></i> Preview
    </a>

    {{-- Download PDF --}}
    <a href="{{ route('manager.letters.download', $submission) }}"
       class="btn btn-sm btn-success">
        <i class="fas fa-download"></i> Download
    </a>

    {{-- Upload manual --}}
    <a href="{{ route('manager.letters.upload', $submission) }}"
       class="btn btn-sm btn-secondary">
        <i class="fas fa-upload"></i> Upload Manual
    </a>
</td>