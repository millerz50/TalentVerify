import { getToken } from "next-auth/jwt";
import { NextResponse } from "next/server";
import type { NextRequest } from "next/server";

export async function middleware(req: NextRequest) {
  const session = await getToken({ req, secret: process.env.NEXTAUTH_SECRET });

  // Log incoming requests for debugging
  console.log(`Incoming request URL: ${req.url}`);

  // Redirect unauthenticated users to the Auth page
  if (!session) {
    console.log("No session found, redirecting to /Auth.");
    const loginUrl = new URL("/Auth", req.url);
    return NextResponse.redirect(loginUrl);
  }

  // Allow authenticated users to continue
  console.log("Session valid, continuing to the requested route.");
  return NextResponse.next();
}

// Middleware configuration: Exclude API routes
export const config = {
  matcher: [
    "/", // Home
    "/dashboard", // Dashboard
    "/profile", // Profile
  ], // Protect these user-facing routes only, NOT API routes.
};
