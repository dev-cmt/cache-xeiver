<style>
    .password-form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        border: 1px solid #ced4da;
    }

    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
        flex-direction: column;
    }

    .form-group {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .form-group.full-width {
        flex: none;
        width: 100%;
        margin-bottom: 15px;
    }

    .form-group label {
        /* font-weight: bold; */
        /* color: #555; */
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"],
    input[type="file"],
    textarea,
    select {
        width: 50%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
        min-height: 80px;
    }

    .save-button {
        width: 50%;
        padding: 15px;
        background-color: #000;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 1.1em;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .save-button:hover {
        background-color: #333;
    }

    @media(max-width:425px){

 input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"],
    input[type="file"],
    textarea,
    select {
        width: 100%;
    }

    .save-button {
        width: 100%;
    }
    }
</style>

<div class="password-form-container">
    <form action="{{ route('user.change.password.update') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="current-password">Current Password</label>
                <input type="password" id="current-password" name="current_password" placeholder="Current password">
                @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new_password" placeholder="New password">
                @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm New Password</label>
                <input type="password" id="confirm-password" name="new_password_confirmation"
                    placeholder="Confirm new password">
            </div>
            <div class="form-group">
                <button class="save-button">Change Password</button>
            </div>
        </div>
    </form>
</div>
