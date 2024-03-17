    <div style="margin-bottom: 20px; font-size: 14px; color: #4B5563;">
        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div style="margin-bottom: 20px; font-weight: bold; font-size: 14px; color: #34D399;">
            A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif

    <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit" style="background-color: #6366F1; color: #FFFFFF; border: none; padding: 8px 16px; border-radius: 5px; font-size: 14px; cursor: pointer;">Resend Verification Email</button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" style="text-decoration: underline; font-size: 14px; color: #4B5563; cursor: pointer;">Log Out</button>
        </form>
    </div>
