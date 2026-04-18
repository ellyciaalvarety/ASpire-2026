"use client";

import Link from "next/link";
import { useState } from "react";

export default function Login() {
  const [form, setForm] = useState({
    email: "",
    password: "",
  });

  // LOGIN KE BACKEND
  const handleLogin = async (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();

    if (!form.email || !form.password) {
      alert("Email dan password wajib diisi!");
      return;
    }

    try {
      const res = await fetch("http://localhost:3000/api/auth/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(form),
      });

      const data = await res.json();

      if (!res.ok) {
        alert(data.message || "Login gagal");
        return;
      }

      //  simpan token & user
      localStorage.setItem("token", data.token);
      localStorage.setItem("user", JSON.stringify(data.user));

      //  redirect berdasarkan role
      if (data.user.role === "admin") {
        window.location.href = "/admin/dashboard";
      } else {
        window.location.href = "/member/dashboard";
      }

    } catch (err) {
      console.error(err);
      alert("Tidak bisa connect ke server");
    }
  };

  return (
    <div className="page-login">

      {/* NAVBAR */}
      <div className="navbar">
        LibrAspire
      </div>

      <main className="auth-wrap">
        <section className="auth-card">

          {/* LEFT */}
          <div className="auth-intro">
            <h1>Welcome Back</h1>
            <p>
              Login untuk lanjut menjelajahi koleksi, melihat rekomendasi buku,
              dan mengelola peminjamanmu di LibrAspire.
            </p>
          </div>

          {/* RIGHT */}
          <div className="auth-form">
            <h2>Login</h2>
            <p className="sub">Masukkan email dan password akunmu.</p>

            <form onSubmit={handleLogin}>
              <div className="field">
                <label>Email</label>
                <input
                  type="email"
                  placeholder="you@example.com"
                  required
                  value={form.email}
                  onChange={(e) =>
                    setForm({ ...form, email: e.target.value })
                  }
                />
              </div>

              <div className="field">
                <label>Password</label>
                <input
                  type="password"
                  placeholder="Masukkan password"
                  required
                  value={form.password}
                  onChange={(e) =>
                    setForm({ ...form, password: e.target.value })
                  }
                />
              </div>

              <button type="submit" className="btn-login">
                Login
              </button>
            </form>

            <div className="form-footer">
              Belum punya akun?{" "}
              <Link href="/register">Daftar sekarang</Link>
            </div>
          </div>

        </section>
      </main>

      {/* CSS */}
      <style jsx>{`
        .page-login {
          min-height: 100vh;
          background: #eff3f8;
          font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
          display: flex;
          flex-direction: column;
        }

        .navbar {
          padding: 20px 50px;
          font-size: 22px;
          font-weight: bold;
          color: #1e3a8a;
        }

        .auth-wrap {
          flex: 1;
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 40px 24px;
        }

        .auth-card {
          width: min(920px, 100%);
          display: grid;
          grid-template-columns: 1fr 1fr;
          border-radius: 30px;
          overflow: hidden;
          background: #ffffff;
          box-shadow: 0 28px 65px rgba(15, 35, 77, 0.14);
        }

        .auth-intro {
          padding: 52px 44px;
          background: linear-gradient(165deg, #0f234d 0%, #1d3772 100%);
          color: #ffffff;
          display: flex;
          flex-direction: column;
          justify-content: center;
        }

        .auth-intro h1 {
          margin: 0 0 12px;
          font-size: 40px;
        }

        .auth-intro p {
          color: rgba(255,255,255,0.82);
          font-size: 14px;
          line-height: 1.8;
        }

        .auth-form {
          padding: 52px 44px;
        }

        .auth-form h2 {
          font-size: 34px;
          color: #10214b;
        }

        .sub {
          margin-bottom: 28px;
          color: #5a6582;
          font-size: 14px;
        }

        .field {
          display: flex;
          flex-direction: column;
          gap: 8px;
          margin-bottom: 16px;
        }

        .field label {
          font-size: 13px;
          font-weight: 600;
          color: #5a6582;
        }

        .field input {
          border: 1px solid #d5dcea;
          border-radius: 14px;
          padding: 13px 15px;
          background: #f9fbff;
        }

        .field input:focus {
          border-color: #90a3d8;
          box-shadow: 0 0 0 4px rgba(29, 55, 114, 0.1);
          outline: none;
        }

        .btn-login {
          width: 100%;
          border-radius: 999px;
          padding: 13px;
          background: #0f234d;
          color: white;
          font-weight: bold;
          cursor: pointer;
          margin-top: 6px;
        }

        .btn-login:hover {
          background: #1d3772;
        }

        .form-footer {
          margin-top: 18px;
          text-align: center;
          color: #5a6582;
        }

        .form-footer a {
          color: #0f234d;
          font-weight: 600;
          text-decoration: none;
        }

        @media (max-width: 900px) {
          .auth-card {
            grid-template-columns: 1fr;
          }

          .auth-intro,
          .auth-form {
            padding: 34px 24px;
          }
        }
      `}</style>
    </div>
  );
}