"use client";

export default function Footer() {
  return (
    <div className="footer">
      <p>© 2025 LibrAspire. All rights reserved.</p>
      <p>Email | Twitter | Facebook | Instagram</p>
      <p>Jl Raya ITS, Surabaya, Indonesia</p>

      <style jsx>{`
        .footer {
          background: #0f2a5c;
          color: white;
          text-align: center;
          padding: 30px;
        }

        .footer p {
          font-size: 14px;
          margin: 5px 0;
        }
      `}</style>
    </div>
  );
}