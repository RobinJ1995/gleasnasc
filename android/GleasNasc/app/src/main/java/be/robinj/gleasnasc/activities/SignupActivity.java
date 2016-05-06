package be.robinj.gleasnasc.activities;

// TODO:Check what v4 supports in regards to devices !
import android.support.v4.app.FragmentActivity;
import android.os.Bundle;
import android.view.View;

import be.robinj.gleasnasc.R;
import be.robinj.gleasnasc.fragments.signup.EmailFragment;
import be.robinj.gleasnasc.fragments.signup.PasswordFragment;
import be.robinj.gleasnasc.fragments.signup.UsernameFragment;

public class SignupActivity
        extends
            FragmentActivity
        implements
            EmailFragment.OnClickListener,
            UsernameFragment.OnClickListener,
            PasswordFragment.OnClickListener
{

    EmailFragment emailFragment;
    UsernameFragment usernameFragment;
    PasswordFragment passwordFragment;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_signup);


        // Check that the activity is using the layout version with
        // the fragment_container FrameLayout
        if (findViewById(R.id.fragment_container) != null) {

            // However, if we're being restored from a previous state,
            // then we don't need to do anything and should return or else
            // we could end up with overlapping fragments.
            if (savedInstanceState != null) {
                return;
            }

            // Instantiate fragments
            emailFragment = new EmailFragment();
            usernameFragment = new UsernameFragment();
            passwordFragment = new PasswordFragment();

            // In case this activity was started with special instructions from an
            // Intent, pass the Intent's extras to the fragment as arguments
            emailFragment.setArguments(getIntent().getExtras());

            // Add the fragment to the 'fragment_container' FrameLayout
            getSupportFragmentManager().beginTransaction().add(R.id.fragment_container, emailFragment).commit();
        }


    }

    @Override
    public void btnContinue_Click(View v)
    {

    }

}
