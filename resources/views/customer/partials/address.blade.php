<style>
    .address-card {
    padding: 20px;
    border-radius: 3px;
    border: 1px solid #ced4da;
}

   .address-info {
    margin-bottom: 20px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 15px;
}

    .address-columns {
        display: flex;
        gap: 40px;
    }

    .address-section {
        flex: 1;
    }

    .address-section h4 {
        font-size: 1.2em;
        margin: 0 0 10px 0;
        border-bottom: 2px solid #333;
        padding-bottom: 5px;
    }

    .address-section p {
        margin: 5px 0;
    }
</style>
<div class="address-card">
    <p class="address-info">The following addresses will be used on the checkout page by default.</p>
    <div class="address-columns">
        <div class="address-section">
            <h4>Shipping Address</h4>
            <p><strong>Name:</strong> {{ Auth::guard('web')->user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::guard('web')->user()->email }}</p>
            <p><strong>Phone:</strong> {{ Auth::guard('web')->user()->phone }}</p>
            <p><strong>Address:</strong> {{ Auth::guard('web')->user()->address }}</p>
        </div>
        <div class="address-section">
            <h4>Billing Address</h4>
            <p><strong>Name:</strong> {{ Auth::guard('web')->user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::guard('web')->user()->email }}</p>
            <p><strong>Phone:</strong> {{ Auth::guard('web')->user()->phone }}</p>
            <p><strong>Address:</strong> {{ Auth::guard('web')->user()->address }}</p>
        </div>
    </div>
</div>
