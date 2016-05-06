package be.robinj.gleasnasc.fragments.signup;

import android.content.Context;
import android.support.v4.app.Fragment;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import be.robinj.gleasnasc.R;

/**
 * Created by Tom on 5/5/2016.
 */
public class EmailFragment extends Fragment
{
    private OnClickListener listener;

    public interface OnClickListener
    {
        public void btnContinue_Click(View v);
    }

    @Override
    public View onCreateView (LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState)
    {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.signup_email_fragment, container, false);

    }

    @Override
    public void onAttach(Context context)
    {
        super.onAttach(context);
        if (context instanceof OnClickListener)
        {
            listener = (OnClickListener) context;
        }
        else
        {
            throw new ClassCastException(context.toString() + " must implement " + this + ".OnClickListener");
        }
    }

    public void btnContinue_Click(View v)
    {

    }

}

