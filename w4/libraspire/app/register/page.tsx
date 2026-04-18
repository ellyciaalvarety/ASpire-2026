"use client";

import Link from "next/link";
import { useState } from "react";
import { useRouter } from "next/navigation";
import type { FormEvent } from "react";

export default function Register() {
  const router = useRouter();

  const [form, setForm] = useState({
    name: "",
    email: "",
    password: "",
    confirm: "",
  });

  // ✅ REGISTER KE BACKEND
  const handleSubmit = async (e: FormEvent<HTMLFormElement>) => {
    e.preventDefault();

    if (form.password !== form.confirm) {
      alert("Password tidak sama!");
      return;
    }

    try {
      const res = await fetch("http://localhost:3000/api/auth/register", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          name: form.name,
          email: form.email,
          password: form.password,
        }),
      });

      const data = await res.json();

      if (!res.ok) {
        alert(data.message || "Register gagal");
        return;
      }

      alert("Register berhasil!");

      // redirect ke login
      router.push("/login");

    } catch (err) {
      console.error(err);
      alert("Tidak bisa connect ke server");
    }
  };

  return (
    <div className="page-register">

      {/* NAVBAR */}
      <div className="navbar">
        LibrAspire
      </div>

      <main className="auth-wrap">
        <section className="auth-card">

          {/* FORM */}
          <div className="auth-form">
            <h2>Create Account</h2>
            <p className="sub">
              Daftar akun baru untuk mulai memakai LibrAspire.
            </p>

            <form onSubmit={handleSubmit}>
              <div className="field">
                <label>Nama</label>
                <input
                  type="text"
                  placeholder="Masukkan nama"
                  required
                  value={form.name}
                  onChange={(e) =>
                    setForm({ ...form, name: e.target.value })
                  }
                />
              </div>

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
                  placeholder="Buat password"
                  required
                  value={form.password}
                  onChange={(e) =>
                    setForm({ ...form, password: e.target.value })
                  }
                />
              </div>

              <div className="field">
                <label>Konfirmasi Password</label>
                <input
                  type="password"
                  placeholder="Ulangi password"
                  required
                  value={form.confirm}
                  onChange={(e) =>
                    setForm({ ...form, confirm: e.target.value })
                  }
                />
              </div>

              <button type="submit" className="btn-register">
                Register
              </button>
            </form>

            <div className="form-footer">
              Sudah punya akun?{" "}
              <Link href="/login">Login sekarang</Link>
            </div>
          </div>

          {/* RIGHT SIDE */}
          <div className="auth-intro">
            <h1>Join LibrAspire</h1>
            <p>
              Buat akunmu dan nikmati pengalaman membaca yang lebih rapi,
              mulai dari eksplorasi koleksi hingga manajemen peminjaman.
            </p>
          </div>

        </section>
      </main>

      {/* CSS tetap */}
      <style jsx>{`
        .navbar {
          padding: 20px 50px;
          font-size: 22px;
          font-weight: bold;
          color: #1e3a8a;
        }

        .page-register {
          min-height: 100vh;
          background: #eff3f8;
          font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
          display: flex;
          flex-direction: column;
        }

        .auth-wrap {
          flex: 1;
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 40px 24px;
        }

        .auth-card {
          width: min(980px, 100%);
          display: grid;
          grid-template-columns: 1fr 1fr;
          border-radius: 30px;
          overflow: hidden;
          background: #ffffff;
          box-shadow: 0 28px 65px rgba(15, 35, 77, 0.14);
        }

        .auth-form {
          padding: 46px 44px;
        }

        .auth-form h2 {
          font-size: 34px;
          color: #10214b;
        }

        .sub {
          margin-bottom: 24px;
          color: #5a6582;
        }

        .field {
          display: flex;
          flex-direction: column;
          gap: 8px;
          margin-bottom: 14px;
        }

        .field input {
          border: 1px solid #d5dcea;
          border-radius: 14px;
          padding: 12px;
          background: #f9fbff;
        }

        .btn-register {
          width: 100%;
          border-radius: 999px;
          padding: 13px;
          background: #0f234d;
          color: white;
        }

        .auth-intro {
          padding: 52px;
          background: linear-gradient(165deg, #0f234d, #1d3772);
          color: white;
        }
      `}</style>
    </div>
  );
}