<style>
    /* alert wrapper */
    .alert-wrapper {
        position: fixed;
        top: 0;
        left: 50%;
        translate: -50% 0;
        z-index: 1;
    }

    /* alert */
    .alert {
        padding: 1rem 1.25rem;
        border-radius: 0.25rem;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        color: var(--white);
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 0.75rem;
    }

    .alert-success {
        border: 1px solid var(--success-color);
        border-top: 0;
        background-color: var(--success-bg);
    }

    .alert-danger {
        border: 1px solid var(--danger-color);
        border-top: 0;
        background-color: var(--danger-bg);
    }

    .alert-warning {
        border: 1px solid var(--warning-color);
        border-top: 0;
        background-color: var(--warning-bg);
    }

    .alert>button {
        background: none;
        border: none;
        font-size: 1.25em;
        line-height: .25em;
        filter: brightness(80%);
    }

    .alert>button:hover {
        filter: brightness(100%);
    }

    .alert>button:active {
        filter: brightness(60%);
    }
</style>

<div class="alert-wrapper">
    <div class="alert alert-{{ $type }}">
        {{ $message }}
        <button type="button">&times;</button>
    </div>
</div>
