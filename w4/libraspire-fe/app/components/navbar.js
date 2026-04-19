"use client";
import Link from "next/link";

export default function Navbar() {
  return (
    <div className="navbar">
      <Link href="/" className="logo">LibrAspire</Link>

      <input className="search" placeholder="Search book..." />

      <div className="nav-links">
        <Link href="/dashboard">Home</Link>
        <Link href="/contact">Contact</Link>
        <Link href="/profil">Profile</Link>
      </div>

      <style jsx>{`
        .navbar {
          display: flex;
          justify-content: space-between;
          padding: 20px;
          background: white;
        }
        .logo { font-weight: bold; }
      `}</style>
    </div>
  );
}