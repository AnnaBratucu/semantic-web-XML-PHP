<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    
    <xsl:template match="/">
        <html>
            <body>
                <h2>Extra-courses graduated</h2>
                <p>With green those in the last 3 years, with yellow the rest :
                </p>
            </body>
        </html>
        
        <xsl:for-each select="Persons/Person/InformalEducation/Course">
            <xsl:if test="YearGraduation &lt;= 2019">
                <xsl:choose>
                    <xsl:when test="YearGraduation &gt; 2016">
                        <li>
                            <span style="color:#9acd32">   
                                <xsl:value-of select="Name" /> </span>
                        </li>
                    </xsl:when>
                    
                    <xsl:otherwise>
                        <li>
                            <span style="color:#FFFF00">
                                <xsl:value-of select="Name" /> </span>
                        </li>
                    </xsl:otherwise>
                </xsl:choose>
            </xsl:if>
        </xsl:for-each>
        
    </xsl:template>
    
</xsl:stylesheet>