package be.robinj.gleasnasc.activities;

import android.app.ProgressDialog;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import be.robinj.gleasnasc.R;

public class LoginActivity extends AppCompatActivity
{
    // Input field for the user
    EditText etUsername;
    EditText etPassword;
    Button btnLogin;
    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_login);
        etUsername = (EditText) findViewById(R.id.etUsername);
        etPassword = (EditText) findViewById(R.id.etPassword);
        btnLogin = (Button) findViewById(R.id.btnLogin);
    }

    public void btnLogin_Click(View view)
    {
        if ( !validate())
        {
            onLoginFailed();
            return;
        }
        // Disable button to prevent spam
        btnLogin.setEnabled(false);

        // Create dialog to show user we're doing something
        final ProgressDialog progressDialog = new ProgressDialog
                (
                        LoginActivity.this,
                        R.style.AppTheme
                );
        progressDialog.setIndeterminate(true);
        progressDialog.setMessage("Logging in...");
        progressDialog.show();

        // TODO: Check credentials against Robin's API

        new android.os.Handler()
                .postDelayed
                        (
                                new Runnable()
                                {
                                    @Override
                                    public void run()
                                    {
                                        onLoginSuccess();
                                        progressDialog.dismiss();
                                    }
                                },
                                5000
                        );
    }
    public boolean validate()
    {
            boolean valid = true;

            // Get form data
            String username = etUsername.getText().toString();
            String password = etPassword.getText().toString();

            // Catch empty strings and show corresponding error messages
            if (username.isEmpty())
            {
                    etUsername.setError("Cannot be empty");
                    valid = false;
            }
            else
            {
                    etUsername.setError(null);
            }

            if (password.isEmpty())
            {
                    etPassword.setError("Cannot be empty");
                    valid = false;
            }
            else
            {
                    etPassword.setError(null);
            }

            return valid;
    }
    public void onLoginFailed()
    {
        Toast.makeText(getBaseContext(), "Login failed", Toast.LENGTH_LONG).show();
        btnLogin.setEnabled(true);
    }
    public void onLoginSuccess()
    {
        btnLogin.setEnabled(true);
        // TODO: Succes lolgic
//        Intent intent = new Intent(this, MainActivity.class);
    }

    public void btnSignUp_Click(View view)
    {
            Intent intent = new Intent(this, SignupActivity.class);
            startActivity(intent);
    }
}
