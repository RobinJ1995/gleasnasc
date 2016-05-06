package be.robinj.gleasnasc.fragments.signup;

import android.app.Fragment;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import be.robinj.gleasnasc.R;

/**
 * Created by Tom on 5/5/2016.
 */
public class UsernameFragment extends Fragment
{
    private OnClickListener listener;

    public interface OnClickListener
    {
        public void btnContinue_Click(View v);
    }

    public View onCreateView (LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState)
    {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.signup_username_fragment, container, false);
    }
}

