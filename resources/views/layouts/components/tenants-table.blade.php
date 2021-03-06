<tr class="status-{{ $tenant->status_id }}">
    <td class="name all">
        <span class="last-name">{{ $tenant->last_name }}</span>,
        <span class="first-name">{{ $tenant->first_name }}</span>
    </td>
    <td class="id none">
        {{ $tenant->id }}
    </td>
    <td class="contact">
        <div class="btn-group contact-button">
            <a href="tel:{{ clickablePhone($tenant->phone_1) }}" class="btn btn-secondary">
                <span><i class="fas fa-phone"></i>{{ cleanPhone($tenant->phone_1) }}</span>
            </a>
            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                @if($tenant->phone_2)
            <a class="dropdown-item" href="tel:{{ clickablePhone($tenant->phone_2) }}">
                    <span><i class="fas fa-phone"></i> {{ cleanPhone($tenant->phone_2) }}</span>
                </a>
                @endif
                @if($tenant->fax)
                <a class="dropdown-item">
                    <span><i class="fas fa-fax"></i> {{ cleanPhone($tenant->fax) }}</span>
                </a>
                @endif
                @if($tenant->email)
                <a class="dropdown-item" href="mailto:{{ $tenant->email }}">
                    <span><i class="fas fa-at"></i> {{ $tenant->email }}</span>
                </a>
                @endif
            </div>
        </div> <!-- btn group -->
    </td>
    <td class="street-address">
        <span class="item">{{ $tenant->street_1 }}</span>
        <span class="item">{{ $tenant->street_2 }}</span>
    </td>
    <td class="city">
        {{ $tenant->city }}
    </td>
    <td class="state">
        {{ $tenant->state }}
    </td>
    <td class="zip">
        {{ $tenant->zip }}
    </td>
    <td class="created-on none">
        <span class="date">
            {{ cleanDate($tenant->created_at) }}
        </span>
    </td>
    <td class="updated-on none">
        <span class="date">
            {{ cleanDate($tenant->updated_at) }}
        </span>
        <span class="date-readable">
            {{ $tenant->updated_at->diffForHumans() }}
        </span>
    </td>
    <td class="view-button not-mobile-p">
        <a href="{{ route('tenants.show', $tenant) }}" class="btn btn-secondary btn-sm view-link"><i class="fas fa-eye"></i></a>
        <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-secondary btn-sm view-link"><i class="fas fa-pencil-alt"></i></a>
    </td>
</tr>
