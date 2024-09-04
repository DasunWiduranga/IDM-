@extends('layouts.app')

@section('content')
    <div style="width: 80%; margin: 0 auto; padding-top: 20px;">
        <h2 style="text-align: center; color: #333;">Audit Logs</h2>

        @if($audits->count() > 0)
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">ID</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Event</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Auditable Type</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Auditable ID</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">User</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Old Values</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">New Values</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($audits as $audit)
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $audit->id }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $audit->event }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $audit->auditable_type }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $audit->auditable_id }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ optional($audit->user)->name }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ json_encode($audit->old_values) }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ json_encode($audit->new_values) }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $audit->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div style="margin-top: 20px;">
                {{ $audits->links() }}
            </div>
        @else
            <p style="text-align: center; color: #666;">No audit logs found.</p>
        @endif
    </div>
@endsection
