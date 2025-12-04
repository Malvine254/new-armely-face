$file = "c:\xampp\htdocs\new-armely-face\service-details.php"
$content = Get-Content $file -Raw

# Service names and their corresponding includes
$services = @{
    'ai-advisory' = 'php/services/ai-advisory.php'
    'ai-consulting' = 'php/services/ai-consulting.php'
    'generative-ai' = 'php/services/generative-ai.php'
    'data-strategy' = 'php/services/data-strategy.php'
    'data-science' = 'php/services/data-science.php'
    'fabric' = 'php/services/fabric.php'
    'fabric_capacity' = 'php/services/fabric_capacity.php'
    'sqlsupport' = 'php/services/sqlsupport.php'
    'appsupport' = 'php/services/appsupport.php'
    'powerapps' = 'php/services/powerapps.php'
    'powerautomate' = 'php/services/powerautomate.php'
    'snowflake' = 'php/services/snowflake.php'
    'dynamics365' = 'php/services/dynamics365.php'
    'sql-data-warehousing' = 'php/services/sql-data-warehousing.php'
    'apidataaccess' = 'php/services/apidataaccess.php'
    'virtualagents' = 'php/services/virtualagents.php'
    'roboticprocessing' = 'php/services/roboticprocessing.php'
    'sharepointonline' = 'php/services/sharepointonline.php'
    'copilot' = 'php/services/copilot.php'
    'powerplatform' = 'php/services/powerplatform.php'
    'databricks' = 'php/services/databricks.php'
    'pocstarter-ai' = 'php/services/pocstarter-ai.php'
}

$replacements = 0

foreach ($svc in $services.Keys) {
    $startPattern = "<?php if (`$_GET['name']==""$svc""): ?>"
    $endPattern = "<?php endif ?>"
    
    # Find the start
    $startIndex = $content.IndexOf($startPattern)
    
    if ($startIndex -ne -1) {
        # Find the matching endif after the start
        $searchFrom = $startIndex + $startPattern.Length
        $endIndex = $content.IndexOf($endPattern, $searchFrom)
        
        if ($endIndex -ne -1) {
            # Extract the section to replace
            $sectionLength = $endIndex + $endPattern.Length - $startIndex
            $oldSection = $content.Substring($startIndex, $sectionLength)
            
            # Create new section with include
            $newSection = "<?php if (`$_GET['name']==""$svc""): ?>`r`n`t<?php include '$($services[$svc])'; ?>`r`n`t<?php endif ?>"
            
            # Replace
            $content = $content.Replace($oldSection, $newSection)
            $replacements++
            Write-Output "Replaced: $svc"
        }
    }
}

# Save the modified content
Set-Content -Path $file -Value $content -NoNewline
Write-Output "`nTotal replacements: $replacements out of $($services.Count)"
Write-Output "File updated successfully!"
