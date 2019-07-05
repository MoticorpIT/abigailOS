<tr class="status-{{ $company->status_id }}">
    <td class="name all">
        <span class="name-span">{{ $company->name }}</span>
    </td>
    <td class="id none">
        {{ $company->id }}
    </td>
    <td class="contact">
        <div class="btn-group contact-button">
            <a href="tel:{{ clickablePhone($company->phone_1) }}" class="btn btn-secondary">
                <span><i class="fas fa-phone"></i> {{ cleanPhone($company->phone_1) }}</span>
            </a>
            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                @if($company->phone_2)
                <a class="dropdown-item" href="tel:{{ clickablePhone($company->phone_2) }}">
                    <span><i class="fas fa-phone"></i> {{ cleanPhone($company->phone_2) }}</span>
                </a>
                @endif
                @if($company->fax)
                <a class="dropdown-item">
                    <span><i class="fas fa-fax"></i> {{ cleanPhone($company->fax) }}</span>
                </a>
                @endif
                @if($company->email)
                <a class="dropdown-item" href="mailto:{{ $company->email }}">
                    <span><i class="fas fa-at"></i> {{ $company->email }}</span>
                </a>
                @endif
            </div>
        </div> <!-- btn group -->
    </td>
    <td class="street-address">
        <span class="item">{{ $company->street_1 }}</span>
        <span class="item">{{ $company->street_2 }}</span>
    </td>
    <td class="city">
        {{ $company->city }}
    </td>
    <td class="state">
        {{ $company->state }}
    </td>
    <td class="zip">
        {{ $company->zip }}
    </td>
    <td class="created-on none">
        <span class="date">
            {{ cleanDate($company->created_at) ?? '' }}
        </span>
    </td>
    <td class="updated-on none">
        @if($company->updated_at != null)
            <span class="date">
                {{ $company->updated_at != null ? cleanDate($company->updated_at) : '' }}
            </span>
            <span class="date-readable">
                {{ $company->updated_at != null ? $company->updated_at->diffForHumans() : '' }}
            </span>
        @else
            <span class="date">
                NA
            </span>
        @endif
    </td>
    <td class="view-button not-mobile-p">
        <a href="{{ route('companies.show', $company) }}" class="btn btn-secondary btn-sm view-link">
            <i class="fas fa-eye"></i>
        </a>
        <a href="{{ route('companies.edit', $company) }}" class="btn btn-secondary btn-sm view-link">
            <i class="fas fa-pencil-alt"></i>
        </a>
    </td>
</tr>
