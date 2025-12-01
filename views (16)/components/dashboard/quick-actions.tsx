"use client"

export function QuickActions() {
  const actions = [
    { label: "Add Student", icon: "👤" },
    { label: "Add Class", icon: "📚" },
    { label: "Add Major", icon: "🎓" },
    { label: "Import Excel", icon: "📊" },
  ]

  return (
    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
      {actions.map((action, index) => (
        <button
          key={index}
          className="glass-card-hover p-6 rounded-xl flex flex-col items-center justify-center gap-3 group overflow-hidden relative"
        >
          {/* Gradient Background */}
          <div className="absolute inset-0 bg-gradient-to-br from-primary/10 to-secondary/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300" />

          <div className="relative z-10">
            <span className="text-4xl">{action.icon}</span>
            <p className="text-sm font-semibold text-foreground mt-2 text-center">{action.label}</p>
          </div>

          <div className="absolute inset-0 bg-gradient-to-r from-primary/20 to-secondary/20 opacity-0 group-hover:opacity-100 blur-2xl -z-10 transition-opacity" />
        </button>
      ))}
    </div>
  )
}
