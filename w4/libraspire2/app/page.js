"use client";

import Link from "next/link";
import Footer from "../components/Footer";

export default function Home() {
  return (
    <div className="page-home">

      {/* NAVBAR */}
      <div className="navbar">
        LibrAspire
      </div>

      {/* HERO */}
      <section className="hero">
        <div className="hero-text">
          <h1>
            Find and <br /> Borrow Books <br /> Easily
          </h1>
          <p>Access thousands of books anytime, anywhere.</p>

          <div className="hero-buttons">
            <Link href="/dashboard">
              <button className="btn btn-primary">Next</button>
            </Link>
          </div>
        </div>
      </section>

      {/* HOW IT WORKS */}
      <section className="how-it-works">
        <div className="how-img">
          <img src="https://github.com/ellyciaalvarety/ASpire-2026/raw/main/images/imgforhowitworks.png" />
        </div>

        <div className="how-content">
          <h2>How It Works</h2>

          <div className="steps">
            <div className="step">
              <div className="step-num">1</div>
              <div className="step-text">
                <strong>Browse Books</strong>
                <span>Explore available books easily.</span>
              </div>
            </div>

            <div className="step">
              <div className="step-num">2</div>
              <div className="step-text">
                <strong>Select Book</strong>
                <span>Choose the book you want.</span>
              </div>
            </div>

            <div className="step">
              <div className="step-num">3</div>
              <div className="step-text">
                <strong>Borrow</strong>
                <span>Click borrow to add to your list.</span>
              </div>
            </div>

            <div className="step">
              <div className="step-num">4</div>
              <div className="step-text">
                <strong>View History</strong>
                <span>Check your borrowed books.</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* FOOTER COMPONENT */}
      <Footer />

      {/* CSS */}
      <style jsx>{`
        .page-home {
          background: #f5f6fa;
          min-height: 100vh;
          font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
          padding: 20px 50px;
          font-size: 22px;
          font-weight: bold;
          color: #1e3a8a;
        }

        .hero {
          min-height: 90vh;
          display: flex;
          justify-content: center;
          align-items: center;
          text-align: center;
          padding: 40px;
        }

        .hero-text {
          max-width: 520px;
        }

        .hero-text h1 {
          font-family: 'Playfair Display', serif;
          font-size: 56px;
          color: #1e3a8a;
          margin-bottom: 20px;
        }

        .hero-text p {
          font-size: 18px;
          color: #3b4a6b;
          margin-bottom: 30px;
        }

        .hero-buttons {
          display: flex;
          justify-content: center;
        }

        .btn {
          padding: 14px 40px;
          border-radius: 999px;
          cursor: pointer;
          border: none;
        }

        .btn-primary {
          background: #1e3a8a;
          color: white;
        }

        .btn-primary:hover {
          background: #162d6b;
        }

        .how-it-works {
          display: grid;
          grid-template-columns: 1fr 1fr;
        }

        .how-img img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }

        .how-content {
          background: #0d2243;
          color: white;
          padding: 60px;
        }

        .how-content h2 {
          font-family: 'Playfair Display', serif;
          font-size: 34px;
          margin-bottom: 30px;
        }

        .steps {
          display: flex;
          flex-direction: column;
          gap: 18px;
        }

        .step {
          display: flex;
          gap: 12px;
        }

        .step-num {
          width: 30px;
          height: 30px;
          border-radius: 50%;
          background: rgba(255,255,255,0.15);
          display: flex;
          align-items: center;
          justify-content: center;
        }

        @media (max-width: 768px) {
          .how-it-works {
            grid-template-columns: 1fr;
          }
        }
      `}</style>
    </div>
  );
}